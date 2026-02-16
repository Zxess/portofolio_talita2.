<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class WhatsAppController extends Controller
{
    /**
     * Send contact form via WhatsApp
     */
    public function send(Request $request): RedirectResponse
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // WhatsApp Business API number (replace with your actual number)
        $whatsappNumber = env('WHATSAPP_BUSINESS_NUMBER', '6282123456789');
        
        // Format message
        $messageText = sprintf(
            "New Contact:\nName: %s\nEmail: %s\nMessage: %s",
            $validated['name'],
            $validated['email'],
            $validated['message']
        );

        // Create WhatsApp URL (if using WhatsApp Web)
        // For production, implement proper WhatsApp Business API integration
        $whatsappUrl = 'https://wa.me/' . preg_replace('/\D/', '', $whatsappNumber) 
            . '?text=' . urlencode($messageText);

        // For now, just redirect back with success message
        return redirect()->back()->with('success', 'Pesan telah disiapkan untuk dikirim ke WhatsApp. Silakan klik tombol WhatsApp atau salin pesan di atas.');
    }
}
