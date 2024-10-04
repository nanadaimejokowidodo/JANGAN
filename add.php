<!DOCTYPE html>
<html lang="en" class="dark-theme">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coin2pay - Crypto Payment</title>
	<link rel="icon" type="image/png" sizes="32x32" href="https://hostedpage.coin2pay.io/assets/img/logo/logo-coin2pay_icon-light.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9ecef;
            padding: 0px;
        }
        .container {
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }
        select {
            padding: 10px 15px;
            width: 100%;
            border: solid 1px;
            border-radius: 5px;
            font-size: 16px;
            background-color: #f8f9fa;
            appearance: none;
            cursor: pointer;
        }
        select:hover {
            background-color: #e2e6ea;
        }
        .info-card {
            padding: 20px;
            margin-top: 30px;
            border: 1px solid #e2e6ea;
            border-radius: 5px;
            display: none;
        }
        .input-container {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        input[type="text"] {
            padding: 10px;
            margin-right: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .copy-btn, .submit-btn {
            padding: 10px;
            cursor: pointer;
            background-color: #f4f4f4;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .copy-btn:hover, submit-btn:hover {
            background-color: #e2e2e2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3><b><center>Cryptocurrency Automatic Gateway</center></b></h3>
        <h5><center>Fast, secure, and easy payments</center></h5>
        <div style="text-align: center;">
            <b style="font-size: 25px; color: #444;">We Accept:</b><br>
            <img id="logo" height="50" width="50" style="border-radius: 50px;" src="https://i.imgur.com/OCqVnuj.png">
            <img id="logo" height="50" width="50" style="border-radius: 50px;" src="https://i.imgur.com/2G6tOPQ.png">
            <img id="logo" height="50" width="50" style="border-radius: 50px;" src="https://i.imgur.com/TVFmQpt.png">
        </div>
        
        <p style="text-align: left; margin-top: 50px;">
            Please select your preferred crypto, and we will automatically generate a payment address for you. <br>
            After getting the payment address, please send a minimum of $100 to the selected network and coin. <br>
            Your payment will be processed immediately after confirmation.
        </p>
		

        <label for="network">Select Gateway:</label>
        <select id="network">
            <option value="" selected="">--Select your Payment Gateway--</option>
            <option value="Bitcoin">Bitcoin</option>
            <option value="Ethereum">Ethereum</option>
            <option value="Tetherer">USDT (ERC20)</option>
            <option value="Tetherer20">USDT (TRC20)</option>
        </select>

        <div class="info-card" id="content">
            <div class="input-container">
                <input type="text" readonly="" style="width: 49%;" value="">
                <button class="copy-btn" onclick="copyToClipboard(this)">Copy</button>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('network').addEventListener('change', function() {
            const selectedValue = this.value;
            const contentDiv = document.getElementById('content');
            contentDiv.style.display = "block";
            
            switch (selectedValue) {
                case 'Bitcoin':
                    contentDiv.innerHTML = `
                        <p>You can only send <b>Bitcoin</b> to this address. Sending other coins might result in loss of your funds.</p>
                        <p>Minimum deposit: <font color="red"><b>$100</b></font></p>
                        <b>Selected Network: Bitcoin</b><br><br>
                        <div style="text-align: center;">
                            <img style="height: 200px;" src="https://www.bitcoinqrcodemaker.com/api/?style=bitcoin&address=bc1qtyqge0wg70eq5wf68kzm7jgqyt6znvl2x52j2k">
                        </div>
                        <div class="input-container">
                            Bitcoin Address: 
                            <input type="text" readonly style="width: 49%;" value="bc1qtyqge0wg70eq5wf68kzm7jgqyt6znvl2x52j2k">
                            <button class="copy-btn" onclick="copyToClipboard(this)">Copy</button>
                        </div>
                        <center>Scan the QR code or copy the address to proceed with your payment.<br><br><br>
						<button onclick="confirmTransfer()" class="submit-btn" >Submit Payment</button></center>
                    `;
                    break;

                case 'Ethereum':
                    contentDiv.innerHTML = `
                        <p>You can only send <b>Ethereum</b> to this address. Sending other coins might result in loss of your funds.</p>
                        <p>Minimum deposit: <font color="red"><b>$100</b></font></p>
                        <b>Selected Network: Ethereum (ERC20)</b><br><br>
                        <div style="text-align: center;">
                            <img style="height: 200px;" src="https://www.bitcoinqrcodemaker.com/api/?style=ethereum&address=0x1503cb5993f99cf24c8287a2fd49060481fe928d">
                        </div>
                        <div class="input-container">
                            Ethereum Address: 
                            <input type="text" readonly style="width: 49%;" value="0x1503cb5993f99cf24c8287a2fd49060481fe928d">
                            <button class="copy-btn" onclick="copyToClipboard(this)">Copy</button>
                        </div>
                        <center>Scan the QR code or copy the address to proceed with your payment.<br><br><br>
						<button class="submit-btn" >Submit Payment</button></center>
                    `;
                    break;

                case 'Tetherer':
                    contentDiv.innerHTML = `
                        <p>You can only send <b>USDT (ERC20)</b> to this address. Sending other coins might result in loss of your funds.</p>
                        <p>Minimum deposit: <font color="red"><b>$100</b></font></p>
                        <b>Selected Network: USDT (ERC20)</b><br><br>
                        <div style="text-align: center;">
                            <img style="height: 200px;" src="https://www.bitcoinqrcodemaker.com/api/?style=ethereum&address=0x1503cb5993f99cf24c8287a2fd49060481fe928d">
                        </div>
                        <div class="input-container">
                            USDT (ERC20) Address: 
                            <input type="text" readonly style="width: 49%;" value="0x1503cb5993f99cf24c8287a2fd49060481fe928d">
                            <button class="copy-btn" onclick="copyToClipboard(this)">Copy</button>
                        </div>
                        <center>Scan the QR code or copy the address to proceed with your payment.<br><br><br>
						<button class="submit-btn" >Submit Payment</button></center>
                    `;
                    break;

                case 'Tetherer20':
                    contentDiv.innerHTML = `
                        <p>You can only send <b>USDT (TRC20)</b> to this address. Sending other coins might result in loss of your funds.</p>
                        <p>Minimum deposit: <font color="red"><b>$100</b></font></p>
                        <b>Selected Network: USDT (TRC20)</b><br><br>
                        <div style="text-align: center;">
                            <img style="height: 200px;" src="https://api.qrserver.com/v1/create-qr-code/?data=TPAUAkBAYSr9xakYKwUKE4Uo7kcheJmY5k">
                        </div>
                        <div class="input-container">
                            USDT (TRC20) Address: 
                            <input type="text" readonly style="width: 49%;" value="TPAUAkBAYSr9xakYKwUKE4Uo7kcheJmY5k">
                            <button class="copy-btn" onclick="copyToClipboard(this)">Copy</button>
                        </div>
                        <center>Scan the QR code or copy the address to proceed with your payment.<br><br><br>
						<button class="submit-btn" >Submit Payment</button></center>
                    `;
                    break;

                default:
                    contentDiv.style.display = "none";
                    break;
            }
        });

        function copyToClipboard(btn) {
            const input = btn.previousElementSibling;
            input.select();
            document.execCommand("copy");
        }

        window.onload = function() {
            document.getElementById('network').value = "";
        };
function confirmTransfer() {
    alert("Payment submitted. Waiting for confirmation.");
    
    // Tampilkan loading selama 15 detik
    setTimeout(function() {
        // Setelah 15 detik kembali ke halaman sebelumnya
        history.back();
    }, 15000); // 15000 milidetik = 15 detik
}
    </script>
</body>
</html>
