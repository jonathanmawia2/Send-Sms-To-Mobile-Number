<?php
    if(isset($_POST['submit']))
    {
        $apiKey="use your api key";
        $sendeName="use your sendername  or use the shared one[23107]";
    

        $bodyRequest =array(
            "mobile" =>$_POST['phone'],
            "response_type"=>"json",
            "sender_name"=>$sendeName,
            "service_id"=>0,
            "message"=>$_POST['message']
        );
        $payload = json_encode($bodyRequest);
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.mobitechtechnologies.com/sms/sendsms',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>$payload,
        CURLOPT_HTTPHEADER => array(
            'h_api_key: '.$apiKey,
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        if($response)
        {
            echo "<script>
            alert('Message send successfully')
            window.location = 'index.php'
            </script>";
            
        }
    
    }
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send sms to Form</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 pt-4">
                <div class="card shadow">
                    <div class="card-title text-center font-weight-bold">Enter details here:</div>
                    <div class="card-body">
                        <form action="index.php" method="POST">
                            <div class="mb-2">
                                <label for="">Phone</label>
                                <input type="text" name="phone" placeholder="+254xxxxxxxx  or 07.........." class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label for="">Message</label>
                                <textarea name="message" id="" cols="30" rows="10" class="form-control" placeholder="enter your message here to send"></textarea>
                            </div>
                            <div class="mb-2">
                                <button name="submit" class="btn btn-success btn-block">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
