<?php

namespace App\Http\Controllers;
use OpenAI\Laravel\Facades\OpenAI;
use App\Models\Prompt;
use Illuminate\Http\Request;

class PromptController extends Controller
{
    //
    function generateResult(Request $request) {

      $result = OpenAI::completions()->create($request->all());
      $prompt = new Prompt([
        'prompt_text' => $request->prompt,
        'data' => $result
      ]);
      return response()->json($prompt);
    }
}
