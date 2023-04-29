@if ($pago->tipo_pago === 'efectivo')
  <p>El pago se ha registrado exitosamente. Por favor, presente su comprobante de depósito en nuestras oficinas.</p>
@else
  <p>El pago se ha registrado exitosamente. Escanee el siguiente código QR para confirmar su pago:</p>
  <img src="{{ asset($pago->imagen_qr) }}" alt="Código QR de confirmación de pago">
@endif