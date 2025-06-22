<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام القيم من الفورم
    $studentName = trim($_POST['student_name']);
    $phoneNumber = trim($_POST['phone_number']);
    $cardNumber = trim($_POST['card_number']);
    $amount = trim($_POST['amount']);

    // رقم بطاقة الكي كارد الخاصة بنا (ثابت)
    $receiverCard = "6104337777000000";

    // تنسيق البيانات المحفوظة في ملف نصي
    $data = "اسم الطالب: $studentName | رقم الهاتف: $phoneNumber | رقم بطاقة الطالب: $cardNumber | مبلغ القسط: $amount IQD | تحويل إلى: $receiverCard" . PHP_EOL;

    // حفظ البيانات داخل ملف students.txt مع قفل للملف أثناء الكتابة
    $file = 'students.txt';
    file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

    // رسالة نجاح مع رابط للعودة للنموذج
    echo "<h2 style='text-align:center; font-family: Arial;'>✅ تم الحفظ بنجاح</h2>";
    echo "<p style='text-align:center; font-family: Arial;'><a href='index.html'>إدخال طالب جديد</a></p>";
} else {
    // في حال الوصول مباشرة بدون POST يعيد التوجيه للصفحة الرئيسية
    header("Location: index.html");
    exit();
}
?>
