<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Pyre Clone - Secret Message</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-notify/dist/simple-notify.css" />

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/simple-notify/dist/simple-notify.min.js"></script>
    <style>
        /* Background gradasi + tekstur */
        body {
            background: radial-gradient(circle at bottom left, #1a1a1a, #0f172a);
            background-image: radial-gradient(circle at bottom left, #1a1a1a, #0f172a),
                url("https://grainy-gradients.vercel.app/noise.svg");
            background-size: cover;
            overflow: hidden;
        }

        /* Animasi fade + slide */
        @keyframes fadeSlideUp {
            0% {
                opacity: 0;
                transform: translateY(30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-slide {
            animation: fadeSlideUp 0.8s ease-out forwards;
        }
    </style>
    @livewireStyles

</head>

<body class="flex flex-col items-center justify-center min-h-screen text-white px-4 relative animate-fade-slide">

    <!-- Logo -->
    <span class="text-sm font-extrabold text-gray-400 tracking-wide">
        Clone
    </span>

    <h1 class="text-7xl font-extrabold mb-5 text-orange-400 tracking-wide">
        PYRE<span class="text-orange-500">'</span>
    </h1>
    <livewire:message-form />

    @livewireScripts
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('notify', (data) => {
                new Notify({
                    title: 'Success!',
                    text: 'Link generated successfully!',
                    status: 'success'
                });
            });
            Livewire.on('copyToClipboard', (data) => {
                new Notify({
                    title: 'Success!',
                    text: 'Link copied to clipboard!',
                    status: 'success'
                });

            });
        });
    </script>
</body>

</html>
