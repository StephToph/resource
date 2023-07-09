<!DOCTYPE html>
<html>
<head>
  <title>Bulk Message Sender</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    .container {
      max-width: 500px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
    }
    h1 {
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
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 class="mb-4">Bulk Message Sender</h1>
    <form id="messageForm">
      <div class="mb-3">
        <label for="recipients" class="form-label">Recipients (separated by commas):</label>
        <textarea id="recipients" name="recipients" class="form-control" rows="5" placeholder="Enter recipient phone numbers" required></textarea>
      </div>

      <div class="mb-3">
        <label for="message" class="form-label">Message:</label>
        <textarea id="message" name="message" class="form-control" rows="5" placeholder="Enter your message" required></textarea>
      </div>

      <div class="d-grid">
      <button type="submit" class="btn btn-primary btn-block">Send Messages</button></div>
    </form>
    <div id="statusContainer"></div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
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
