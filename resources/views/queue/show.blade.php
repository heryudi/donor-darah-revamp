<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mencetak Antrian...</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }
        .container {
            text-align: center;
        }
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border-left-color: #09f;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        iframe {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="spinner"></div>
        <h2>Mencetak Nomor Antrian...</h2>
        <p>Silakan ambil cetakan antrian Anda.</p>
        <p>Halaman ini akan kembali ke Beranda secara otomatis dalam beberapa detik.</p>
    </div>

    <!-- Hidden iframe to load and print the PDF -->
    <iframe id="pdfFrame" src="{{ route('queues.print_pdf', $queue->id) }}"></iframe>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var iframe = document.getElementById('pdfFrame');
            var timeout = 5000; // Time in ms before redirecting (5 seconds)
            var redirectUrl = "{{ route('donors.index') }}";

            // If the browser supports auto-printing the iframe, try it
            iframe.onload = function() {
                try {
                    iframe.contentWindow.print();
                } catch(e) {
                    console.log("Auto-print failed, might need user interaction or PDF JS handling it.");
                }
                
                // Set a timeout to redirect to home page after a set delay
                setTimeout(function() {
                    window.location.href = redirectUrl;
                }, timeout);
            };
        });
    </script>
</body>
</html>