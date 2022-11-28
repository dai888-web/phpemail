//$email=$_GET["mail"];
//$name=$_GET["username"];
        $email=$_POST['mail']; //收件人的邮箱
        $name=$_POST['username']; //收件人的姓名
        $huizhi="<h1>这里放html格式的内容</h1>"; //发送的邮件内容 html写的
        require 'PHPMailermaster/src/Exception.php';
        require 'PHPMailermaster/src/PHPMailer.php';
        require 'PHPMailermaster/src/SMTP.php';
        $mail = new PHPMailer(true);
        try{
//服务器配置
            $mail->CharSet ="UTF-8";                     //设定邮件编码
            $mail->SMTPDebug = 0;                        // 调试模式输出
            $mail->isSMTP();                             // 使用SMTP
            $mail->Host = 'smtp.qq.com';                // SMTP服务器
            $mail->SMTPAuth = true;                      // 允许 SMTP 认证
            $mail->Username = '***********';                // SMTP 用户名  发件人的邮箱 即邮箱的用户名
            $mail->Password = '***********';             // SMTP 密码  部分邮箱是授权码(例如163邮箱)
            $mail->SMTPSecure = 'ssl';                    // 允许 TLS 或者ssl协议
            $mail->Port = 465;                            // 服务器端口 25 或者465 具体要看邮箱服务器支持
            $mail->setFrom('邮箱', '姓名');  //发件人
            $mail->addAddress('邮箱','姓名');  // 收件人
//$mail->addAddress('ellen@example.com');  // 可添加多个收件人
            $mail->addReplyTo('邮箱', '姓名'); //回复的时候回复给哪个邮箱 建议和发件人一致
//$mail->addCC('cc@example.com');                    //抄送
//$mail->addBCC('bcc@example.com');                    //密送
//发送附件
// $mail->addAttachment(dirname(__FILE__).'\PHPMailer-master.zip');         // 添加附件
// $mail->addAttachment(dirname(__FILE__).'\PHPMailer-master.zip', '要接收的文件.zip');    // 发送附件并且重命名
//Content
            $mail->isHTML(true);                                  // 是否以HTML文档格式发送  发送后客户端可直接显示对应HTML内容
            $mail->Subject = '注册代大大后台的验证码';//主题名
            $mail->Body    = $huizhi;
            $mail->AltBody = '你的设备不支持此邮件，请使用谷歌浏览器查看！';
            $mail->send();
            
            } 
        catch(Exception $e)
        {echo '发送失败';}
