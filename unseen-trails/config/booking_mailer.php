<?php

function sendBookingConfirmationEmail($name, $email, $destination, $travelDate) {
  $dateLabel = date('D, F j, Y', strtotime($travelDate));
  $subject = 'Booking Confirmed - Unseen Trails';
  $safeName = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  $safeDestination = htmlspecialchars($destination, ENT_QUOTES, 'UTF-8');
  $safeDate = htmlspecialchars($dateLabel, ENT_QUOTES, 'UTF-8');

  $htmlBody = "
    <h2>Booking Confirmed huss!</h2>
    <p>Hi {$safeName},</p>
    <p>Your journey to <strong>{$safeDestination}</strong> is reserved for <strong>{$safeDate}</strong>.</p>
    <p>Full trip details contain here.</p>
    <p>Thank you for choosing Unseen Trails.</p>
  ";

  $textBody = "Booking Confirmed!\n\n"
    . "Hi {$name},\n"
    . "Your journey to {$destination} is reserved for {$dateLabel}.\n"
    . "Full trip details contain here.\n\n"
    . "Thank you for choosing Unseen Trails.";

  $fromEmail = 'govindx2026@gmail.com'; // unseentrails email example
  $fromName = 'Unseen Trails';

  $smtpHost = 'smtp.gmail.com';
  $smtpPort = 587;
  $smtpUser = 'govindx2026@gmail.com'; // unseentrails email example
  $smtpPass = 'rpdr gzla qjyr gzzx'; // unseentrails email app password here example "gsts stst ndiw hjai"
  $smtpSecure = 'tls';

  require_once __DIR__ . '/../PHPMailer/src/Exception.php';
  require_once __DIR__ . '/../PHPMailer/src/PHPMailer.php';
  require_once __DIR__ . '/../PHPMailer/src/SMTP.php';

  try {
    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->Port = $smtpPort;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;

    $smtpSecure = strtolower($smtpSecure);
    if ($smtpSecure === 'ssl') {
      $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
    } else {
      $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    }

    $mail->CharSet = 'UTF-8';
    $mail->setFrom($fromEmail, $fromName);
    $mail->addAddress($email, $name);
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $htmlBody;
    $mail->AltBody = $textBody;

    return $mail->send();
  } catch (\Throwable $e) {
    error_log('Booking email SMTP error: ' . $e->getMessage());
    return false;
  }
}
