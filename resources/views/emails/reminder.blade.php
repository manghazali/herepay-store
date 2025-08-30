<h1 style="font-family: Arial, sans-serif; color: #333;">Notification – HerePay</h1>

<p style="font-family: Arial, sans-serif; font-size: 16px;">
    Hello {{ $order->customer_name ?? 'Customer' }},
</p>

<p style="font-family: Arial, sans-serif; font-size: 16px;">
    This is a notification regarding your appointment scheduled on
    <strong>{{ \Carbon\Carbon::parse($appointment->start_time)->format('F j, Y') }}</strong>
    at <strong>{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}</strong>
    until
    <strong>{{ \Carbon\Carbon::parse($appointment->finish_time)->format('F j, Y') }}</strong>
    at <strong>{{ \Carbon\Carbon::parse($appointment->finish_time)->format('g:i A') }}</strong>.
</p>

<p style="font-family: Arial, sans-serif; font-size: 16px;">
    <strong>Status: Successful</strong>
</p>

<p style="font-family: Arial, sans-serif; font-size: 16px;">
    Thank you,<br>
    <strong>HerePay</strong>
</p>
