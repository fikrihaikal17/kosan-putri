<?php

namespace App\Http\Controllers;

use App\Services\KostDataService;
use App\Services\TanyaKostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AiAssistantController extends Controller
{
    public function __construct(
        protected TanyaKostService $tanyaKostService,
        protected KostDataService $kostDataService
    ) {}

    /**
     * Handle incoming question from the Tanya Kost chat widget.
     */
    public function ask(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'question' => ['required', 'string', 'max:500'],
        ]);

        try {
            $result = $this->tanyaKostService->answerQuestion($validated['question']);
            $whatsappUrl = $this->kostDataService->getWhatsAppUrl($result['wa_message']);

            return response()->json([
                'success' => true,
                'answer' => $result['answer'],
                'show_wa_cta' => $result['show_wa_cta'],
                'wa_url' => $whatsappUrl,
                'wa_label' => 'Tanya via WhatsApp',
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'success' => false,
                'answer' => 'Maaf, layanan Tanya Kost sedang mengalami kendala teknis. Silakan hubungi kami langsung melalui WhatsApp.',
                'show_wa_cta' => true,
                'wa_url' => $this->kostDataService->getWhatsAppUrl(),
                'wa_label' => 'Tanya via WhatsApp',
            ], 500);
        }
    }
}
