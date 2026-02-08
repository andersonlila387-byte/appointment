<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set New Password - Aivio</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: { brand: { black: '#0f172a' } }
                }
            }
        }
    </script>
    <style>
        body { background-color: #000; color: #e4e4e7; font-family: 'Plus Jakarta Sans', sans-serif; }
        .mesh-bg {
            background-color: #000;
            background-image: radial-gradient(at 40% 20%, hsla(0, 0%, 10%, 1) 0px, transparent 50%),
                              radial-gradient(at 80% 0%, hsla(0, 0%, 8%, 1) 0px, transparent 50%);
        }
    </style>
</head>
<body class="min-h-screen flex">

    <!-- Left Panel -->
    <div class="hidden lg:flex lg:w-1/2 relative bg-zinc-900 overflow-hidden border-r border-white/5">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
        <div class="absolute inset-0 mesh-bg opacity-60"></div>
        
        <div class="relative z-10 flex flex-col justify-between p-16 w-full">
            <div>
                <a href="/" class="flex items-center gap-3">
                    <img src="logo.png" alt="Aivio" class="h-10 w-auto rounded-xl shadow-2xl">
                    <span class="text-2xl font-bold text-white tracking-tight">aivio</span>
                </a>
            </div>
            <div class="space-y-8">
                <h2 class="text-5xl font-bold text-white leading-[1.1]">Secure your <br/> <span class="text-blue-500">account.</span></h2>
                <p class="text-zinc-400 text-lg max-w-md leading-relaxed">Choose a strong password to protect your business data and customer information.</p>
            </div>
            <div class="text-zinc-600 text-sm">&copy; 2026 Aivio Inc.</div>
        </div>
    </div>

    <!-- Right Panel -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-6 md:p-12 relative bg-black">
        <!-- Mobile Logo -->
        <div class="absolute top-6 left-6 lg:hidden flex items-center gap-12">
            <a href="/" class="block">
                <img src="logo.png" alt="Aivio" class="h-10 w-auto rounded-xl">
            </a>
            <a href="/" class="text-zinc-400 hover:text-white transition-colors">
                <i data-lucide="home" class="w-6 h-6"></i>
            </a>
        </div>

        <div class="w-full max-w-md space-y-10 mt-12 lg:mt-0">
            <div class="text-left">
                <h1 class="text-3xl md:text-4xl font-bold text-white tracking-tight">New Password</h1>
                <p class="text-zinc-400 mt-3 text-lg">Enter your new password below.</p>
            </div>

            <form id="resetForm" class="space-y-5">
                <input type="hidden" name="token" value="<?php echo htmlspecialchars($_GET['token'] ?? ''); ?>">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email'] ?? ''); ?>">

                <div>
                    <label class="block text-sm font-semibold text-zinc-300 mb-2">New Password</label>
                    <div class="relative">
                        <input type="password" name="password" required minlength="8"
                            class="w-full bg-zinc-900/50 border border-zinc-800 rounded-xl px-4 py-4 text-white focus:ring-2 focus:ring-blue-600 focus:border-blue-600/50 outline-none transition-all placeholder-zinc-600 font-medium"
                            placeholder="••••••••">
                        <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="w-5 h-5 text-zinc-600"></i>
                        </div>
                    </div>
                </div>

                <div id="statusMsg" class="hidden text-sm text-center py-3 rounded-lg border"></div>

                <button type="submit" id="submitBtn" class="w-full bg-white text-black font-bold py-4 rounded-xl hover:bg-zinc-200 transition-all transform active:scale-[0.98] flex items-center justify-center gap-2 shadow-xl shadow-white/10 mt-4">
                    <span>Update Password</span>
                    <i data-lucide="check" class="w-4 h-4"></i>
                </button>
            </form>
        </div>
    </div>

    <script>
        lucide.createIcons();

        document.getElementById('resetForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            const btn = document.getElementById('submitBtn');
            const msg = document.getElementById('statusMsg');
            const originalText = btn.innerHTML;
            
            btn.disabled = true;
            btn.innerHTML = '<i data-lucide="loader-2" class="w-5 h-5 animate-spin"></i> Updating...';
            lucide.createIcons();
            msg.classList.add('hidden');

            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch('/api/auth/reset-password.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                });
                const result = await response.json();
                
                msg.textContent = result.message;
                msg.className = result.status === 'ok' 
                    ? 'text-green-400 bg-green-400/10 border-green-400/20 text-sm text-center py-3 rounded-lg border block'
                    : 'text-red-400 bg-red-400/10 border-red-400/20 text-sm text-center py-3 rounded-lg border block';

                if (result.status === 'ok') {
                    setTimeout(() => window.location.href = 'login.php', 2000);
                }
            } catch (err) {
                msg.textContent = 'An error occurred. Please try again.';
                msg.className = 'text-red-400 bg-red-400/10 border-red-400/20 text-sm text-center py-3 rounded-lg border block';
            } finally {
                btn.disabled = false;
                btn.innerHTML = originalText;
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>