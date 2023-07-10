<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bulk Message Sender</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <style>
    /* CSS styles for media responsiveness */
    @media only screen and (max-width: 600px) {
      body {
      background-color: #f2f2f2;
    }
    .container {
      max-width: 500px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }h1 {
      font-size: 24px;
      margin-top: 0;
    }
    .message-status {
      margin-top: 20px;
      padding: 10px;
      border-radius: 4px;
    }
    .success {
      background-color: #d4edda;
      color: #155724;
    }
    .error {
      background-color: #f8d7da;
      color: #721c24;
    }}
  </style>
</head>
<body>
  <div class="container-fluid">
    <h1 class="mb-4 py-3 text-center">Bulk Message Sender</h1>
    <div class="container bg-light py-3" id="login">
      <div class="row mx-5">
        <h3 class="text-primary mb-4">Login</h3>
        <div class="col-md-6 mb-3">
          <label for="recipients" class="form-label">Username</label>
          <input type="text" class="form-control" name="user" id="user">
        </div>
        <div class="col-md-6 mb-3">
          <label for="recipients" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="d-grid text-center gap-1">
          <button type="button" id="login_btn" onclick="login();" class="btn btn-primary">Login</button>
        </div>
        <div id="login_resp" class="py-2 mt-3 h3 text-center text-danger"></div>
      </div>
    </div>
    
    <div class="row bg-light py-3" id="sender_id" style="display:none;">
      <div class="col-md-12">
        <form id="messageForm">
          <div class="mb-3">
            <label for="recipients" class="form-label">Recipients (separated by commas):</label>
            <textarea id="recipients" name="recipients" class="form-control" rows="5" placeholder="Enter recipient phone numbers" required></textarea>
          </div>

          <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Send Messages</button>
          </div>
        </form>
      </div>
    </div>
    <div id="statusContainer"></div>
  </div>



  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    <?php
      if(!empty($sess_id)){?>
        $('#login').hide();
        $('#sender_id').show(500);
        
      <?php }
    ?>
    function login(){
      var user = $('#user').val();
      var password = $('#password').val();
      if(user === '' || password === ''){
        $('#login_resp').html('Please fill all the Fields');
      } else {
        var base_url = '<?=base_url(); ?>';
        // Send messages
        $.ajax({
          url:  base_url + 'xender/index/login',
          type: 'POST',
          data: {
            user: user,
            password: password
          },
          success: function(response) {
            $('#login_resp').html(response);
          }
        });
      }

      
    }

    $(document).ready(function() {
      $('#messageForm').on('submit', function(e) {
        e.preventDefault();

        var recipients = $('#recipients').val();
        var message = $('#message').val();

        // Split recipient numbers by commas
        var recipientNumbers = recipients.split(',');

        // Remove whitespace from each number
        recipientNumbers = recipientNumbers.map(function(number) {
          return number.trim();
        });
		    var base_url = '<?=base_url(); ?>';
        // Send messages
        $.ajax({
          url:  base_url + 'xender/index/send',
          type: 'POST',
          data: {
            recipients: recipientNumbers,
            message: message
          },
          beforeSend: function() {
            $('#statusContainer').empty();
          },
          success: function(response) {
            displayMessageStatus(response, 'success');
            $('#recipients').val('');
            $('#message').val('');
          },
          error: function(xhr, status, error) {
            displayMessageStatus('Error sending bulk messages. Please try again.', 'error');
          }
        });
      });

      function displayMessageStatus(message, status) {
        var statusClass = (status === 'success') ? 'success' : 'error';
        var statusDiv = $('<div>').addClass('message-status alert alert-' + statusClass).text(message);
        $('#statusContainer').append(statusDiv);
      }
    });
  </script>
</body>
</html>
