<!DOCTYPE html>
<html>
<head>
  <title>Bulk Message Sender</title>
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
    label {
      display: block;
      font-weight: bold;
      margin-top: 10px;
    }
    textarea {
      width: 100%;
      height: 150px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }
    button {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bulk Message Sender</h1>
    <form id="messageForm">
      <label for="recipients">Recipients (separated by commas):</label>
      <textarea id="recipients" name="recipients" placeholder="Enter recipient phone numbers" required></textarea>

      <label for="message">Message:</label>
      <textarea id="message" name="message" rows="5" placeholder="Enter your message" required></textarea>

      <button type="submit">Send Messages</button>
    </form>
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
          success: function(response) {
            console.log('Bulk messages sent successfully!');
            // $('#recipients').val('');
            // $('#message').val('');
          },
          error: function(xhr, status, error) {
            console.log('Error sending bulk messages. Please try again.');
          }
        });
      });
    });
  </script>
</body>
</html>
