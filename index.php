<?php
$generatedLink = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $appName = htmlspecialchars($_POST['app_name']);
    $devName = htmlspecialchars($_POST['dev_name']);
    $email = htmlspecialchars($_POST['email']);
    $appType = htmlspecialchars($_POST['app_type']);
    $date = date("F j, Y");

    // Generate a unique ID for the URL
    $uniqueId = substr(md5(uniqid(rand(), true)), 0, 10);
    $filename = "policy_" . $uniqueId . ".html";
    $dir = "policies";

    // Create 'policies' directory if it doesn't exist
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }

    $filepath = $dir . "/" . $filename;

    // The HTML Template for the generated Privacy Policy
    $htmlContent = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Privacy Policy - $appName</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; padding: 40px 20px; max-width: 800px; margin: auto; background-color: #f8f9fa; color: #333; }
        .container { background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        h1 { color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        h2 { color: #34495e; margin-top: 30px; }
        a { color: #3498db; text-decoration: none; }
    </style>
</head>
<body>
    <div class='container'>
        <h1>Privacy Policy for $appName</h1>
        <p><strong>Effective Date:</strong> $date</p>
        <p>$devName built the <strong>$appName</strong> app as a $appType app. This SERVICE is provided by $devName and is intended for use as is.</p>
        
        <h2>1. Information Collection and Use</h2>
        <p>For a better experience, while using our Service, we may require you to provide us with certain personally identifiable information. The information that we request will be retained by us and used as described in this privacy policy.</p>
        
        <h2>2. Log Data</h2>
        <p>We want to inform you that whenever you use our Service, in a case of an error in the app we collect data and information on your phone called Log Data. This Log Data may include information such as your device Internet Protocol (\"IP\") address, device name, operating system version, and other statistics.</p>
        
        <h2>3. Security</h2>
        <p>We value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable.</p>
        
        <h2>4. Contact Us</h2>
        <p>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us at: <a href='mailto:$email'>$email</a></p>
    </div>
</body>
</html>";

    // Save the file
    file_put_contents($filepath, $htmlContent);

    // Build the full URL to show the user
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $domain = $_SERVER['HTTP_HOST'];
    $path = dirname($_SERVER['PHP_SELF']);
    if($path == '/' || $path == '\\') {
        $path = '';
    }
    $generatedLink = $protocol . "://" . $domain . $path . "/" . $filepath;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pro Policy Maker</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background-color: #0f172a;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            overflow-x: hidden;
            position: relative;
        }
        /* Neon Orbs Background */
        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            z-index: -1;
        }
        .orb-1 { width: 300px; height: 300px; background: #3b82f6; top: -50px; left: -50px; opacity: 0.5; }
        .orb-2 { width: 400px; height: 400px; background: #8b5cf6; bottom: -100px; right: -100px; opacity: 0.5; }
        
        .glass-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }
        h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
            background: linear-gradient(to right, #3b82f6, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .input-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; font-size: 14px; color: #cbd5e1; }
        input, select {
            width: 100%;
            padding: 12px 15px;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
            outline: none;
            transition: all 0.3s ease;
        }
        input:focus, select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 15px rgba(59, 130, 246, 0.3);
        }
        option { background: #0f172a; color: #fff; }
        
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(to right, #3b82f6, #8b5cf6);
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(59, 130, 246, 0.4);
        }

        .result-box {
            margin-top: 30px;
            padding: 20px;
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            border-radius: 10px;
            text-align: center;
            display: <?php echo $generatedLink != "" ? "block" : "none"; ?>;
        }
        .result-box h3 { color: #10b981; margin-bottom: 10px; font-size: 18px; }
        .url-text {
            background: rgba(0, 0, 0, 0.3);
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            word-break: break-all;
            margin-bottom: 15px;
            color: #94a3b8;
        }
        .btn-copy {
            background: #10b981;
            color: #fff;
            border: none;
            padding: 8px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s;
        }
        .btn-copy:hover { background: #059669; }
    </style>
</head>
<body>

    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="glass-container">
        <h2>Policy Generator Pro</h2>
        <form method="POST" action="">
            <div class="input-group">
                <label>App Name</label>
                <input type="text" name="app_name" required placeholder="e.g. Neon Hero">
            </div>
            
            <div class="input-group">
                <label>Developer / Company Name</label>
                <input type="text" name="dev_name" required placeholder="e.g. John Doe">
            </div>

            <div class="input-group">
                <label>Support Email</label>
                <input type="email" name="email" required placeholder="support@example.com">
            </div>

            <div class="input-group">
                <label>App Type</label>
                <select name="app_type" required>
                    <option value="Free">Free</option>
                    <option value="Freemium">Freemium</option>
                    <option value="Commercial">Commercial</option>
                </select>
            </div>

            <button type="submit" class="btn-submit">Generate Privacy Policy URL</button>
        </form>

        <?php if($generatedLink != ""): ?>
        <div class="result-box" id="resultBox">
            <h3>Success! URL Generated 🚀</h3>
            <div class="url-text" id="policyUrl"><?php echo $generatedLink; ?></div>
            <button class="btn-copy" onclick="copyUrl()">Copy URL</button>
            <a href="<?php echo $generatedLink; ?>" target="_blank" style="display:inline-block; margin-left:10px; color:#fff; font-size:14px; text-decoration:underline;">View Policy</a>
        </div>
        <?php endif; ?>

    </div>

    <script>
        function copyUrl() {
            var urlText = document.getElementById("policyUrl").innerText;
            navigator.clipboard.writeText(urlText).then(function() {
                var copyBtn = document.querySelector('.btn-copy');
                copyBtn.innerText = "Copied! ✅";
                copyBtn.style.background = "#3b82f6";
                setTimeout(function(){
                    copyBtn.innerText = "Copy URL";
                    copyBtn.style.background = "#10b981";
                }, 2000);
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
</body>
</html>
