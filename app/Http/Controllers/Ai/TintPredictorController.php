<?php

namespace App\Http\Controllers\Ai;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class TintPredictorController extends Controller
{
    public function show(): View
    {
        return view('ai.tint_predictor.tint_predictor');
    }

    public function tintColor(Request $request): JsonResponse
    {
        $string = $request->input('data');

        $convertedHex = $this->validateAndConvertToRGB($string);

        if (!$convertedHex) {
            return response()->json(['error' => 'Wrong color format']);
        }

        $r = $convertedHex['r'];
        $g = $convertedHex['g'];
        $b = $convertedHex['b'];

        $response = Http::post(env('TINTTEST_URL'), [
            'red' => $r,
            'green' => $g,
            'blue' => $b,
        ])->json();

        $bg = 'rgb(' . $response['color'] . ')';
        $prediction = $response['prediction'];

        return response()->json(['bg' => $bg, 'prediction' => $prediction]);
    }

    private function validateAndConvertToRGB($inputValue): array|bool
    {
        $hexPattern = '/^#?([a-fA-F0-9]{6}|[a-fA-F0-9]{8})$/';

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

        return false;
    }
}
