<?php

namespace App\Http\Controllers\Ai;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class TintTestController extends Controller
{
    public function show(): View
    {
        return view('ai.tint_test.tint_test');
    }

    public function tintColor(Request $request): JsonResponse
    {
        $string = $request->input('data');

        $convertedHex = $this->validateAndConvertToRGB($string);
        info($convertedHex);
        if (! $convertedHex) {
            return response()->json(['error' => 'Wrong color format']);
        }

        $r = $convertedHex['r'];
        $g = $convertedHex['g'];
        $b = $convertedHex['b'];

        //        $processOutput = shell_exec("cd /var/www/material-colors.com/python ; source /var/www/material-colors.com/python/bin/activate ; python model.py $r $g $b");

        info(__DIR__);
        $process = new Process(
            [
                'source '.'python/venv/bin/activate',
            ]
        );
        $process->run();

        if (! $process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        $data = $process->getOutput();

        info($data);

        return response()->json(['result' => $data]);
    }

    private function validateAndConvertToRGB($inputValue): array|bool
    {
        $hexPattern = '/^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{8})$/';
        $rgbPattern = "/^(\d{1,3}),(\d{1,3}),(\d{1,3})(,(\d{1,3}))?$/";

        if (preg_match($hexPattern, $inputValue, $matches)) {
            // Remove potential # at the start
            $color = ltrim($matches[0], '#');

            $r = hexdec(substr($color, 0, 2));
            $g = hexdec(substr($color, 2, 2));
            $b = hexdec(substr($color, 4, 2));

            return [
                'r' => $r,
                'g' => $g,
                'b' => $b,
            ];
        }

        if (preg_match($rgbPattern, $inputValue, $matches)) {
            $r = (int) $matches[1];
            $g = (int) $matches[2];
            $b = (int) $matches[3];

            if ($r >= 0 && $r <= 255 && $g >= 0 && $g <= 255 && $b >= 0 && $b <= 255) {
                return [
                    'r' => $r,
                    'g' => $g,
                    'b' => $b,
                ];
            }
        }

        return false;
    }
}
