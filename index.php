<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aivio - Universal Appointment Infrastructure</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            black: '#0f172a',
                            gray: '#334155',
                            accent: '#3b82f6',
                            border: '#e2e8f0'
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'blob': 'blob 7s infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        }
                    },
                    boxShadow: {
                        'glass': '0 8px 32px 0 rgba(31, 38, 135, 0.07)',
                        'glow': '0 0 40px -10px rgba(59, 130, 246, 0.3)',
                        'pill': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06), 0 0 0 1px rgba(255, 255, 255, 0.5) inset',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #F8FAFC; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

        /* Mobile Menu Animation */
        .mobile-menu {
            transition: opacity 0.4s cubic-bezier(0.16, 1, 0.3, 1), transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            opacity: 0;
            pointer-events: none;
            transform: scale(0.98) translateY(-10px);
        }
        .mobile-menu.open {
            opacity: 1;
            pointer-events: auto;
            transform: scale(1) translateY(0);
        }

        /* Custom Hamburger Animation */
        .hamburger line {
            transition: 0.3s ease-in-out;
            transform-origin: center;
        }
        .hamburger.active line:nth-child(1) {
            transform: translateY(6px) rotate(45deg);
        }
        .hamburger.active line:nth-child(2) {
            opacity: 0;
        }
        .hamburger.active line:nth-child(3) {
            transform: translateY(-6px) rotate(-45deg);
        }

        /* Mesh Gradient Background */
        .mesh-bg {
            background-color: #000000;
            background-image: 
                radial-gradient(at 40% 20%, hsla(0, 0%, 10%, 1) 0px, transparent 50%),
                radial-gradient(at 80% 0%, hsla(0, 0%, 8%, 1) 0px, transparent 50%),
                radial-gradient(at 0% 50%, hsla(0, 0%, 10%, 1) 0px, transparent 50%);
        }
        
        /* Advanced 3D Transform Presets */
        .preserve-3d { transform-style: preserve-3d; }
        .perspective-1000 { perspective: 1000px; }
        .rotate-x-12 { transform: rotateX(12deg); }
        
        /* Grid Pattern for Cards */
        .bg-grid-slate-100 {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='32' height='32' fill='none' stroke='%231e293b'%3e%3cpath d='M0 .5H31.5V32'/%3e%3c/svg%3e");
        }
    </style>
</head>
<body class="mesh-bg text-zinc-300 antialiased overflow-x-hidden bg-black">

    <!-- ADVANCED FLOATING NAVBAR -->
    <div class="sticky top-0 z-50 flex justify-center px-4 w-full py-4">
        <nav class="bg-black/70 backdrop-blur-xl backdrop-saturate-150 border border-white/10 shadow-2xl shadow-black/20 rounded-full px-6 py-3.5 flex items-center justify-between w-full max-w-6xl transition-all duration-300 hover:bg-black/90 hover:shadow-black/40 hover:scale-[1.005]">
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2 group mr-8 shrink-0">
                <img src="logo.png" alt="Aivio" class="h-8 w-auto group-hover:scale-105 transition-transform">
            </a>

            <!-- Desktop Menu (Hidden on mobile, visible on tablet+) -->
            <div class="hidden md:flex items-center gap-6 text-sm font-medium text-zinc-400 whitespace-nowrap">
                <a href="#features" class="hover:text-white transition-colors">Core Engine</a>
                <a href="#deploy" class="hover:text-white transition-colors">Deploy</a>
                <a href="#pricing" class="hover:text-white transition-colors">Pricing</a>
            </div>

            <!-- CTA & Mobile Trigger -->
            <div class="flex items-center gap-3 ml-auto md:ml-0 shrink-0">
                <a href="#" class="hidden md:inline-flex px-4 py-2 bg-transparent text-sm font-semibold text-zinc-400 hover:text-white transition-colors">
                    Sign in
                </a>
                <a href="#" class="hidden md:inline-flex px-5 py-2.5 bg-white rounded-full text-sm font-semibold text-black shadow-lg shadow-white/10 hover:bg-zinc-200 hover:-translate-y-0.5 transition-all">
                    Get Started
                </a>

                <!-- Custom Hamburger Icon -->
                <button id="menu-btn" class="md:hidden w-8 h-8 flex items-center justify-center focus:outline-none ml-2">
                    <svg class="hamburger w-5 h-5 stroke-white" viewBox="0 0 24 24" fill="none" stroke-width="2.5" stroke-linecap="round">
                        <line x1="4" y1="6" x2="20" y2="6"></line>
                        <line x1="4" y1="12" x2="20" y2="12"></line>
                        <line x1="4" y1="18" x2="20" y2="18"></line>
                    </svg>
                </button>
            </div>
        </nav>
    </div>

    <!-- FULL SCREEN MOBILE MENU -->
    <div id="mobile-menu" class="mobile-menu fixed inset-0 z-40 bg-black/95 backdrop-blur-3xl flex flex-col items-center justify-center md:hidden">
        <div class="flex flex-col gap-8 text-center">
            <a href="#features" class="text-3xl font-bold text-white hover:text-blue-400 transition-colors" onclick="toggleMenu()">Core Engine</a>
            <a href="#deploy" class="text-3xl font-bold text-white hover:text-blue-400 transition-colors" onclick="toggleMenu()">Deploy</a>
            <a href="#pricing" class="text-3xl font-bold text-white hover:text-blue-400 transition-colors" onclick="toggleMenu()">Pricing</a>
            
            <div class="w-16 h-1 bg-zinc-800 rounded-full mx-auto my-4"></div>
            
            <div class="flex flex-col gap-4 w-64 mx-auto">
                <a href="register.php" onclick="toggleMenu()" class="w-full py-4 text-center bg-white text-black rounded-2xl font-bold text-lg shadow-xl shadow-white/10">Get Started</a>
                <a href="#" class="w-full py-4 text-center text-zinc-400 font-semibold hover:text-white">Sign in</a>
            </div>
        </div>
    </div>
    <!-- Overlay -->
    <div id="menu-overlay" class="fixed inset-0 bg-black/20 z-30 opacity-0 pointer-events-none transition-opacity duration-300 backdrop-blur-sm" onclick="toggleMenu()"></div>

    <!-- CENTRALIZED HERO SECTION -->
    <header class="relative pt-10 pb-16 md:pt-20 md:pb-20 lg:pt-24 lg:pb-24 overflow-hidden text-center">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0 -z-10">
            <img src="https://th.bing.com/th/id/R.bc3bb6f70ff43c1f9755b4f8e4038544?rik=12xPupfKeYxxbA&pid=ImgRaw&r=0" alt="Background" class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-black"></div>
       </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 flex flex-col items-center relative z-10">
            
            
            <!-- Headline -->
            <h1 class="text-4xl sm:text-5xl md:text-7xl font-bold tracking-tight text-white mb-6 leading-[1.1] max-w-4xl">
                The Operating System <br class="hidden md:block" /> for <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Modern Booking.</span>
            </h1>
            
            <!-- Subhead -->
            <p class="text-base sm:text-lg md:text-xl text-zinc-400 mb-8 md:mb-10 leading-relaxed max-w-2xl mx-auto px-4">
                Build your appointment business on solid infrastructure. Widget-first, Blind ID security, and Naira payments baked in.
            </p>

            <!-- CTAs -->
            <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                <a href="register.php" class="px-8 py-4 bg-white text-black rounded-full font-semibold shadow-xl shadow-white/10 hover:bg-zinc-200 hover:-translate-y-1 transition-all text-center w-full sm:w-auto">
                    Start Building Free
                </a>
                <a href="#features" class="px-8 py-4 bg-transparent border border-zinc-700 text-zinc-300 rounded-full font-semibold hover:bg-zinc-800 hover:border-zinc-600 transition-all text-center flex items-center justify-center gap-2 w-full sm:w-auto">
                    View Documentation
                </a>
            </div>

        </div>
    </header>

    <!-- FEATURES SECTION (Bento Grid Widget Layout) -->
    <section id="features" class="py-24 px-6 bg-black relative z-20 overflow-hidden">
        <!-- Background Decor -->
        <div class="absolute inset-0 bg-grid-slate-100 [mask-image:linear-gradient(0deg,#020617,rgba(2,6,23,0.6))] -z-10 opacity-10"></div>
        
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-20 max-w-3xl mx-auto">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-6 tracking-tight">Everything you need to <br class="hidden md:block" /> run your business.</h2>
                <p class="text-lg text-zinc-400">Stop stitching together tools. Aivio provides the complete primitive layer for scheduling, payments, and team management.</p>
            </div>

            <!-- BENTO GRID -->
            <!-- Updated Grid for Tablet Responsiveness: md:grid-cols-2 lg:grid-cols-12 -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[350px]">
                
               <!-- CARD 1: Sync Engine (Large Left) -->
                <!-- md:col-span-1 (half width on tablet) lg:col-span-7 -->
                <div class="group relative bg-zinc-900 rounded-[2.5rem] border border-zinc-800 overflow-hidden hover:shadow-2xl hover:shadow-black/50 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>

                    <div class="p-8 md:p-10 flex flex-col h-full relative z-10">
                        <div class="mb-auto">
                            <div class="w-12 h-12 bg-zinc-800 rounded-2xl border border-zinc-700 flex items-center justify-center shadow-sm mb-6 text-blue-500">
                                <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/><path d="M16 21h5v-5"/></svg>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-2">Universal Sync</h3>
                            <p class="text-zinc-400">Real-time two-way sync with Google Calendar. We handle the conflict logic.</p>
                            <ul class="mt-4 space-y-2 text-sm text-zinc-400 font-medium">
                                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-500"></i> Multi-calendar support</li>
                                <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-blue-500"></i> Instant conflict resolution</li>
                            </ul>

                        </div>

                        <!-- Abstract Sync Visual -->
                        <div class="absolute -bottom-12 -right-12 w-64 h-64 bg-blue-100 rounded-full opacity-20 blur-3xl group-hover:opacity-30 transition-opacity"></div>
                        <div class="absolute bottom-8 right-8 text-blue-200/50 group-hover:text-blue-200 transition-colors duration-500 transform group-hover:rotate-180">
                            <i data-lucide="refresh-cw" class="w-32 h-32"></i>
                        </div>
                    </div>
                </div>

                <!-- CARD 2: Security (Small Right) -->
                <!-- md:col-span-1 lg:col-span-5 -->
                <div class="group relative bg-zinc-950 rounded-[2.5rem] overflow-hidden hover:shadow-2xl hover:shadow-black/50 transition-all duration-500 border border-zinc-800">
                    <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
                    <div class="absolute top-0 right-0 w-64 h-64 bg-blue-500 rounded-full blur-[100px] opacity-20 group-hover:opacity-40 transition-opacity"></div>

                    <div class="p-8 md:p-10 flex flex-col h-full relative z-10 text-white">
                        <div class="mb-6">
                            <div class="w-12 h-12 bg-white/10 backdrop-blur rounded-2xl border border-white/10 flex items-center justify-center shadow-sm mb-6 text-blue-400">
                                <i data-lucide="lock" class="w-6 h-6"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Blind ID Security</h3>
                            <p class="text-zinc-400 text-sm">We never expose database IDs.</p>
                            <ul class="mt-4 space-y-2 text-sm text-zinc-400 font-medium">
                                <li class="flex items-center gap-2"><i data-lucide="shield-check" class="w-4 h-4 text-blue-400"></i> GDPR Compliant</li>
                                <li class="flex items-center gap-2"><i data-lucide="shield-check" class="w-4 h-4 text-blue-400"></i> End-to-end Encryption</li>
                            </ul>
                        </div>
                        
                        <!-- Abstract Security Visual -->
                        <div class="absolute -bottom-8 -right-8 w-48 h-48 bg-blue-500/20 rounded-full blur-2xl group-hover:bg-blue-500/30 transition-all"></div>
                        <div class="absolute bottom-4 right-4 text-white/5 group-hover:text-white/10 transition-colors duration-500">
                            <i data-lucide="fingerprint" class="w-32 h-32"></i>
                        </div>
                    </div>
                </div>

                <!-- CARD 3: Customization (Small Left) -->
                <!-- md:col-span-1 lg:col-span-5 -->
                <div class="group relative bg-zinc-900 rounded-[2.5rem] border border-zinc-800 overflow-hidden hover:shadow-2xl hover:shadow-black/50 transition-all duration-500">
                    <div class="p-8 md:p-10 flex flex-col h-full relative z-10">
                        <div class="w-12 h-12 bg-purple-900/20 rounded-2xl border border-purple-800/50 flex items-center justify-center shadow-sm mb-6 text-purple-400">
                            <i data-lucide="palette" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Total Control</h3>
                        <p class="text-zinc-400 text-sm mb-6">Match your brand perfectly. Dark mode, colors, and layout control.</p>
                        <ul class="mt-auto space-y-2 text-sm text-zinc-400 font-medium">
                            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-purple-500"></i> Custom CSS</li>
                            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-purple-500"></i> White-label ready</li>
                        </ul>
                        
                        <!-- Abstract Customization Visual -->
                        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-purple-100 rounded-full blur-2xl opacity-50 group-hover:opacity-70 transition-opacity"></div>
                        <div class="absolute bottom-4 right-4 text-purple-100 group-hover:text-purple-200 transition-colors duration-500">
                            <i data-lucide="sliders" class="w-24 h-24 opacity-30"></i>
                        </div>
                    </div>
                </div>

                <!-- CARD 4: Analytics (Large Right) -->
                <!-- md:col-span-1 lg:col-span-7 -->
                <div class="group relative bg-zinc-900 rounded-[2.5rem] border border-zinc-800 overflow-hidden hover:shadow-2xl hover:shadow-black/50 transition-all duration-500">
                    <div class="p-8 md:p-10 flex flex-col h-full relative z-10">
                        <div class="flex justify-between items-start mb-6">
                            <div>
                                <h3 class="text-2xl font-bold text-white mb-2">Revenue Engine</h3>
                                <p class="text-zinc-400">Built-in payments via Paystack & Flutterwave.</p>
                                <ul class="mt-4 space-y-2 text-sm text-zinc-400 font-medium">
                                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Automated Invoicing</li>
                                    <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Split Payments</li>
                                </ul>
                            </div>
                            <div class="w-12 h-12 bg-green-900/20 rounded-2xl border border-green-800/50 flex items-center justify-center shadow-sm text-green-500">
                                <span class="font-bold text-lg">₦</span>
                            </div>
                        </div>
                        
                        <!-- Abstract Revenue Visual -->
                        <div class="absolute -bottom-12 -right-12 w-80 h-80 bg-green-100 rounded-full opacity-20 blur-3xl group-hover:opacity-30 transition-opacity"></div>
                        <div class="absolute bottom-0 right-0 text-green-100 group-hover:text-green-200 transition-colors duration-500 translate-y-4 translate-x-4">
                            <i data-lucide="bar-chart-2" class="w-64 h-64 opacity-20"></i>
                        </div>
                    </div>
                </div>

                <!-- CARD 5: Team Logic (New) -->
                <div class="group relative bg-zinc-900 rounded-[2.5rem] border border-zinc-800 overflow-hidden hover:shadow-2xl hover:shadow-black/50 transition-all duration-500">
                    <div class="p-8 md:p-10 flex flex-col h-full relative z-10">
                        <div class="w-12 h-12 bg-orange-900/20 rounded-2xl border border-orange-800/50 flex items-center justify-center shadow-sm mb-6 text-orange-500">
                            <i data-lucide="users" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-white mb-2">Team Logic</h3>
                        <p class="text-zinc-400 text-sm mb-6">Round-robin scheduling and collective availability for teams.</p>
                        <ul class="mt-auto space-y-2 text-sm text-zinc-400 font-medium">
                            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-orange-500"></i> Round-robin Assignment</li>
                            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-orange-500"></i> Collective Events</li>
                        </ul>
                        
                        <!-- Abstract Team Visual -->
                        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-orange-100 rounded-full blur-2xl opacity-50 group-hover:opacity-70 transition-opacity"></div>
                        <div class="absolute bottom-4 right-4 text-orange-100 group-hover:text-orange-200 transition-colors duration-500">
                            <i data-lucide="users" class="w-24 h-24 opacity-30"></i>
                        </div>
                    </div>
                </div>

                <!-- CARD 6: Smart Alerts (New) -->
                <div class="group relative bg-zinc-900 rounded-[2.5rem] overflow-hidden hover:shadow-2xl hover:shadow-black/50 transition-all duration-500 border border-zinc-800">
                    <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
                    <div class="absolute top-0 left-0 w-64 h-64 bg-indigo-500 rounded-full blur-[100px] opacity-20 group-hover:opacity-40 transition-opacity"></div>

                    <div class="p-8 md:p-10 flex flex-col h-full relative z-10 text-white">
                        <div class="w-12 h-12 bg-white/10 backdrop-blur rounded-2xl border border-white/10 flex items-center justify-center shadow-sm mb-6 text-indigo-400">
                            <i data-lucide="bell" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Smart Alerts</h3>
                        <p class="text-zinc-400 text-sm mb-6">Automated email, SMS, and WhatsApp reminders.</p>
                        <ul class="mt-auto space-y-2 text-sm text-zinc-400 font-medium">
                            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-indigo-400"></i> WhatsApp Integration</li>
                            <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-indigo-400"></i> Custom Workflows</li>
                        </ul>
                        
                        <!-- Abstract Alert Visual -->
                        <div class="absolute bottom-4 right-4 text-white/5 group-hover:text-white/10 transition-colors duration-500">
                            <i data-lucide="message-square" class="w-32 h-32"></i>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

   <!-- HOW IT WORKS SECTION -->
    <section class="py-24 px-6 bg-black border-t border-zinc-800 relative overflow-hidden">
        <!-- Background Elements -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-7xl pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-blue-500/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
        </div>

        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center mb-20">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">How it Works</h2>
                <p class="text-zinc-400 text-lg max-w-2xl mx-auto">Three simple steps to automate your scheduling infrastructure.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Step 1: Connect -->
                <div class="group relative bg-zinc-900 border border-zinc-800 rounded-3xl p-8 overflow-hidden hover:border-zinc-700 transition-all duration-500">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <span class="text-9xl font-bold text-white">1</span>
                    </div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-xl flex items-center justify-center mb-6 text-blue-400 group-hover:scale-110 transition-transform duration-500">
                            <i data-lucide="link" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Connect Source</h3>
                        <p class="text-zinc-400 text-sm mb-8">Link your Google Calendar or Outlook. We sync availability instantly.</p>
                        
                        <!-- Widget Visual -->
                        <div class="bg-zinc-950 rounded-xl p-4 border border-zinc-800/50 shadow-inner">
                            <div class="flex items-center justify-between mb-3">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center">
                                        <i data-lucide="calendar" class="w-4 h-4 text-white"></i>
                                    </div>
                                    <span class="text-white text-sm font-medium">Google Calendar</span>
                                </div>
                                <div class="w-8 h-4 bg-green-500/20 rounded-full flex items-center justify-end px-1">
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-xs text-green-400">
                                <i data-lucide="check-circle" class="w-3 h-3"></i>
                                <span>Sync Active</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Configure -->
                <div class="group relative bg-zinc-900 border border-zinc-800 rounded-3xl p-8 overflow-hidden hover:border-zinc-700 transition-all duration-500">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <span class="text-9xl font-bold text-white">2</span>
                    </div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-purple-500/20 rounded-xl flex items-center justify-center mb-6 text-purple-400 group-hover:scale-110 transition-transform duration-500">
                            <i data-lucide="sliders" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Configure Rules</h3>
                        <p class="text-zinc-400 text-sm mb-8">Set availability, buffer times, and pricing. Customize the look.</p>
                        
                        <!-- Widget Visual -->
                        <div class="bg-zinc-950 rounded-xl p-4 border border-zinc-800/50 shadow-inner space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-zinc-500 text-xs">Duration</span>
                                <span class="text-white text-xs bg-zinc-800 px-2 py-1 rounded">30 min</span>
                            </div>
                            <div class="w-full bg-zinc-800 h-1.5 rounded-full overflow-hidden">
                                <div class="bg-purple-500 w-2/3 h-full rounded-full"></div>
                            </div>
                            <div class="flex justify-between items-center pt-1">
                                <span class="text-zinc-500 text-xs">Buffer</span>
                                <span class="text-white text-xs bg-zinc-800 px-2 py-1 rounded">15 min</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Deploy -->
                <div class="group relative bg-zinc-900 border border-zinc-800 rounded-3xl p-8 overflow-hidden hover:border-zinc-700 transition-all duration-500">
                    <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:opacity-20 transition-opacity">
                        <span class="text-9xl font-bold text-white">3</span>
                    </div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-green-500/20 rounded-xl flex items-center justify-center mb-6 text-green-400 group-hover:scale-110 transition-transform duration-500">
                            <i data-lucide="rocket" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-3">Go Live</h3>
                        <p class="text-zinc-400 text-sm mb-8">Share your link or embed the widget. Accept payments instantly.</p>
                        
                        <!-- Widget Visual -->
                        <div class="bg-zinc-950 rounded-xl p-4 border border-zinc-800/50 shadow-inner text-center">
                            <div class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-green-500/20 text-green-400 mb-2">
                                <i data-lucide="check" class="w-5 h-5"></i>
                            </div>
                            <div class="text-white text-sm font-bold">Booking Confirmed</div>
                            <div class="text-zinc-500 text-[10px] mt-1">Tue, Oct 24 • 10:00 AM</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW SECTION: DEPLOYMENT ECOSYSTEM -->
    <section id="deploy" class="py-24 px-6 bg-black border-t border-zinc-800 relative overflow-hidden">
        <!-- Background Glow -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[500px] bg-blue-500/10 rounded-full blur-[120px] -z-10"></div>

        <div class="max-w-7xl mx-auto">
            <div class="mb-20 text-center max-w-3xl mx-auto">
                <span class="text-blue-500 font-bold tracking-wider uppercase text-xs mb-3 block">Deployment</span>
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">Deploy anywhere.</h2>
                <p class="text-zinc-400 text-lg">Your infrastructure shouldn't dictate your frontend. Choose the integration that fits your stack.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Option 1: Hosted Page (Browser Window Style) -->
                <div class="group relative bg-zinc-950 border border-zinc-800 rounded-3xl overflow-hidden hover:border-zinc-700 transition-all duration-300">
                    <div class="p-8 pb-0">
                        <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center mb-6 text-blue-500">
                            <i data-lucide="globe" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Hosted Page</h3>
                        <p class="text-zinc-400 text-sm mb-6">Instant booking page on your own subdomain. No code required.</p>
                    </div>
                    <!-- Visual: Mini Browser -->
                    <div class="mt-4 ml-8 bg-zinc-900 border-t border-l border-zinc-800 rounded-tl-xl h-48 relative overflow-hidden shadow-2xl">
                        <div class="absolute inset-0 bg-zinc-900 flex flex-col">
                            <div class="h-8 border-b border-zinc-800 flex items-center px-3 gap-1.5">
                                <div class="w-2 h-2 rounded-full bg-red-500/50"></div>
                                <div class="w-2 h-2 rounded-full bg-yellow-500/50"></div>
                                <div class="w-2 h-2 rounded-full bg-green-500/50"></div>
                                <div class="ml-2 px-2 py-0.5 bg-zinc-800 rounded text-[8px] text-zinc-500 font-mono w-full max-w-[100px]">aivio.co/acme</div>
                            </div>
                            <div class="p-4 space-y-3">
                                <div class="w-1/2 h-4 bg-zinc-800 rounded"></div>
                                <div class="flex gap-2">
                                    <div class="w-full h-20 bg-zinc-800 rounded border border-zinc-700/50"></div>
                                    <div class="w-full h-20 bg-zinc-800 rounded border border-zinc-700/50"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Option 2: Embed (Code Editor Style) -->
                <div class="group relative bg-zinc-950 border border-zinc-800 rounded-3xl overflow-hidden hover:border-zinc-700 transition-all duration-300">
                    <div class="p-8 pb-0">
                        <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center mb-6 text-purple-500">
                            <i data-lucide="code-2" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Embed Widget</h3>
                        <p class="text-zinc-400 text-sm mb-6">Drop-in React or JS component. Matches your CSS variables.</p>
                    </div>
                    <!-- Visual: Code Snippet -->
                    <div class="mt-4 mx-6 bg-zinc-900 border border-zinc-800 rounded-t-xl h-48 relative overflow-hidden shadow-2xl p-4 font-mono text-[10px] text-zinc-400 leading-relaxed">
                        <span class="text-purple-400">import</span> { Booking } <span class="text-purple-400">from</span> <span class="text-green-400">'@aivio/react'</span>;<br/><br/>
                        <span class="text-blue-400">export default</span> () => (<br/>
                        &nbsp;&nbsp;<span class="text-yellow-400">&lt;Booking</span><br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-300">business</span>=<span class="text-green-400">"acme"</span><br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-blue-300">theme</span>=<span class="text-green-400">"dark"</span><br/>
                        &nbsp;&nbsp;<span class="text-yellow-400">/&gt;</span><br/>
                        );
                    </div>
                </div>

                <!-- Option 3: API (Terminal Style) -->
                <div class="group relative bg-zinc-950 border border-zinc-800 rounded-3xl overflow-hidden hover:border-zinc-700 transition-all duration-300">
                    <div class="p-8 pb-0">
                        <div class="w-12 h-12 bg-green-500/10 rounded-xl flex items-center justify-center mb-6 text-green-500">
                            <i data-lucide="terminal" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Headless API</h3>
                        <p class="text-zinc-400 text-sm mb-6">Full REST API access for completely custom booking flows.</p>
                    </div>
                    <!-- Visual: Terminal -->
                    <div class="mt-4 mx-6 bg-black border border-zinc-800 rounded-t-xl h-48 relative overflow-hidden shadow-2xl p-4 font-mono text-[10px] text-zinc-400">
                        <div class="flex gap-1.5 mb-3 opacity-50">
                            <div class="w-2 h-2 rounded-full bg-zinc-600"></div>
                            <div class="w-2 h-2 rounded-full bg-zinc-600"></div>
                        </div>
                        <span class="text-green-500">➜</span> <span class="text-blue-400">~</span> curl api.aivio.com/v1/slots \<br/>
                        &nbsp;&nbsp;-H <span class="text-yellow-400">"Auth: sk_live_..."</span><br/><br/>
                        <span class="text-zinc-500">{</span><br/>
                        &nbsp;&nbsp;<span class="text-blue-300">"data"</span>: <span class="text-zinc-500">[</span><br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-green-400">"2024-10-24T09:00:00Z"</span>,<br/>
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="text-green-400">"2024-10-24T10:00:00Z"</span><br/>
                        &nbsp;&nbsp;<span class="text-zinc-500">]</span><br/>
                        <span class="text-zinc-500">}</span>
                    </div>
                </div>

            </div>
        </div>


    </section>

    <!-- PRICING SECTION -->
    <section id="pricing" class="py-24 px-6 bg-black border-t border-zinc-800">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white">Simple Pricing</h2>
                <p class="text-zinc-400 mt-4">Start for free, scale when you're ready. Prices in Naira.</p>
            </div>

            <!-- Grid updated for Tablet: md:grid-cols-2 lg:grid-cols-4 -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
               <!-- Free -->
                <div class="bg-zinc-900 p-8 rounded-3xl border border-zinc-800 hover:border-zinc-600 transition-colors">
                    <h3 class="font-bold text-lg text-white">Free</h3>
                    <div class="my-4"><span class="text-3xl font-bold text-white">₦0</span><span class="text-zinc-500">/mo</span></div>
                    <ul class="space-y-3 text-sm text-zinc-400 mb-8">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Basic Widget</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Limited Bookings</li>
                        <li class="flex items-center gap-2 text-zinc-400"><i data-lucide="x" class="w-4 h-4"></i> Google Calendar</li>
                    </ul>
                    <a href="#" class="block w-full py-3 text-center border border-zinc-700 rounded-xl font-semibold text-white hover:border-zinc-500 transition-colors text-sm">Start Free</a>
                </div>

                <!-- Starter -->
                <div class="bg-zinc-900 p-8 rounded-3xl border border-zinc-800 relative overflow-hidden hover:border-zinc-600 transition-colors">
                    <h3 class="font-bold text-lg text-white">Starter</h3>
                    <div class="my-4"><span class="text-3xl font-bold text-white">₦5,000</span><span class="text-zinc-500">/mo</span></div>
                    <ul class="space-y-3 text-sm text-zinc-400 mb-8">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Google Calendar Sync</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Worker Support</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Email Branding</li>
                    </ul>
                    <a href="#" class="block w-full py-3 text-center bg-white text-black rounded-xl font-semibold hover:bg-zinc-200 transition-colors text-sm">Choose Starter</a>
                </div>

                <!-- Pro -->
                <div class="bg-zinc-900 p-8 rounded-3xl border-2 border-blue-600 shadow-xl scale-105 relative z-10">
                    <div class="absolute top-4 right-4 text-[10px] font-bold bg-blue-900/50 border border-blue-800 px-2 py-1 rounded text-blue-200 uppercase">Popular</div>
                    <h3 class="font-bold text-lg text-white">Pro</h3>
                    <div class="my-4"><span class="text-3xl font-bold text-white">₦15,000</span><span class="text-zinc-500">/mo</span></div>
                    <ul class="space-y-3 text-sm text-zinc-400 mb-8">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Everything in Starter</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Form Editor</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Multi-step Forms</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Subdomain Landing Page</li>
                    </ul>
                    <a href="#" class="block w-full py-3 text-center bg-blue-600 text-white rounded-xl font-semibold hover:bg-blue-700 transition-colors text-sm shadow-lg shadow-blue-600/20">Go Pro</a>
                </div>

                <!-- Enterprise -->
                <div class="bg-zinc-900 p-8 rounded-3xl border border-zinc-800 hover:border-zinc-600 transition-colors">
                    <h3 class="font-bold text-lg text-white">Enterprise</h3>
                    <div class="my-4"><span class="text-3xl font-bold text-white">₦50,000</span><span class="text-zinc-500">/mo</span></div>
                    <ul class="space-y-3 text-sm text-zinc-400 mb-8">
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> White-label</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Advanced API</li>
                        <li class="flex items-center gap-2"><i data-lucide="check" class="w-4 h-4 text-green-500"></i> Priority Support</li>
                    </ul>
                    <a href="mailto:sales@aivio.com" class="block w-full py-3 text-center border border-zinc-700 rounded-xl font-semibold text-white hover:border-zinc-500 transition-colors text-sm">Book a Demo</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section id="faq" class="py-24 px-6 bg-black border-t border-zinc-800">
        <div class="max-w-3xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-white">Frequently Asked Questions</h2>
                <p class="text-zinc-400 mt-4">Everything you need to know about the product and billing.</p>
            </div>

            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <details class="group bg-zinc-950 rounded-2xl border border-zinc-800 overflow-hidden open:shadow-lg transition-all duration-300">
                    <summary class="flex justify-between items-center p-6 cursor-pointer list-none text-white font-semibold">
                        <span>Can I use my own domain?</span>
                        <span class="transition-transform group-open:rotate-180">
                            <i data-lucide="chevron-down" class="w-5 h-5 text-zinc-500"></i>
                        </span>
                    </summary>
                    <div class="px-6 pb-6 text-zinc-400 leading-relaxed">
                        Yes! On the Pro and Enterprise plans, you can connect a custom domain (e.g., booking.yourbrand.com) to your hosted page. We handle the SSL certificates automatically.
                    </div>
                </details>

                <!-- FAQ Item 2 -->
                <details class="group bg-zinc-950 rounded-2xl border border-zinc-800 overflow-hidden open:shadow-lg transition-all duration-300">
                    <summary class="flex justify-between items-center p-6 cursor-pointer list-none text-white font-semibold">
                        <span>How do payouts work?</span>
                        <span class="transition-transform group-open:rotate-180">
                            <i data-lucide="chevron-down" class="w-5 h-5 text-zinc-500"></i>
                        </span>
                    </summary>
                    <div class="px-6 pb-6 text-zinc-400 leading-relaxed">
                        We integrate directly with Paystack and Flutterwave. When a client pays for an appointment, the funds go directly to your connected account. We don't hold your money.
                    </div>
                </details>

                <!-- FAQ Item 3 -->
                <details class="group bg-zinc-950 rounded-2xl border border-zinc-800 overflow-hidden open:shadow-lg transition-all duration-300">
                    <summary class="flex justify-between items-center p-6 cursor-pointer list-none text-white font-semibold">
                        <span>Is there a free trial for Pro?</span>
                        <span class="transition-transform group-open:rotate-180">
                            <i data-lucide="chevron-down" class="w-5 h-5 text-zinc-500"></i>
                        </span>
                    </summary>
                    <div class="px-6 pb-6 text-zinc-400 leading-relaxed">
                        We offer a generous Free plan that lets you test the core widget. For Pro features like custom domains and advanced workflows, you can upgrade at any time. We offer a 14-day money-back guarantee.
                    </div>
                </details>

                <!-- FAQ Item 4 -->
                <details class="group bg-zinc-950 rounded-2xl border border-zinc-800 overflow-hidden open:shadow-lg transition-all duration-300">
                    <summary class="flex justify-between items-center p-6 cursor-pointer list-none text-white font-semibold">
                        <span>Can I remove the "Powered by Aivio" branding?</span>
                        <span class="transition-transform group-open:rotate-180">
                            <i data-lucide="chevron-down" class="w-5 h-5 text-zinc-500"></i>
                        </span>
                    </summary>
                    <div class="px-6 pb-6 text-zinc-400 leading-relaxed">
                        Yes, the "Powered by Aivio" badge is removed on the Enterprise plan. The Pro plan allows you to customize colors and add your logo, but retains a small footer badge.
                    </div>
                </details>
            </div>
        </div>
    </section>

    <footer class="bg-black pt-20 pb-10 px-6 border-t border-zinc-800">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-8 mb-16">
                <!-- Brand Column -->
                <div class="col-span-2 lg:col-span-2">
                    <a href="#" class="flex items-center gap-2 mb-6">
                        <img src="logo.png" alt="Aivio" class="h-8 w-auto">
                    </a>
                    <p class="text-zinc-400 text-sm leading-relaxed mb-6 max-w-xs">
                        The operating system for modern booking. Built for developers, designed for businesses.
                    </p>
                    <div class="flex gap-4">
                        <a href="#" class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="twitter" class="w-5 h-5"></i></a>
                        <a href="#" class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="github" class="w-5 h-5"></i></a>
                        <a href="#" class="text-zinc-500 hover:text-white transition-colors"><i data-lucide="linkedin" class="w-5 h-5"></i></a>
                    </div>
                </div>

                <!-- Links Columns -->
                <div>
                    <h4 class="font-bold text-white mb-6">Product</h4>
                    <ul class="space-y-4 text-sm text-zinc-400">
                        <li><a href="#features" class="hover:text-blue-400 transition-colors">Features</a></li>
                        <li><a href="#deploy" class="hover:text-blue-400 transition-colors">Deployment</a></li>
                        <li><a href="#pricing" class="hover:text-blue-400 transition-colors">Pricing</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors">Changelog</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6">Resources</h4>
                    <ul class="space-y-4 text-sm text-zinc-400">
                        <li><a href="#" class="hover:text-blue-400 transition-colors">Documentation</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors">API Reference</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors">Community</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors">Help Center</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-white mb-6">Company</h4>
                    <ul class="space-y-4 text-sm text-zinc-400">
                        <li><a href="#" class="hover:text-blue-400 transition-colors">About</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors">Blog</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors">Careers</a></li>
                        <li><a href="mailto:contact@aivio.com" class="hover:text-blue-400 transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="font-bold text-white mb-6">Legal</h4>
                    <ul class="space-y-4 text-sm text-zinc-400">
                        <li><a href="#" class="hover:text-blue-400 transition-colors">Privacy</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors">Terms</a></li>
                        <li><a href="#" class="hover:text-blue-400 transition-colors">Security</a></li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-zinc-800 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="text-zinc-500 text-sm">
                    &copy; 2026 Aivio Inc. All rights reserved.
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                    <span class="text-sm text-zinc-400 font-medium">All systems operational</span>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Icons
        lucide.createIcons();

        // Menu Toggle Logic
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('menu-overlay');
            const hamburger = document.querySelector('.hamburger');
            
            // Toggle Classes
            const isOpen = menu.classList.contains('open');
            
            if (!isOpen) {
                menu.classList.add('open');
                overlay.classList.remove('opacity-0', 'pointer-events-none');
                hamburger.classList.add('active');
                document.body.style.overflow = 'hidden'; // Prevent background scrolling
            } else {
                menu.classList.remove('open');
                overlay.classList.add('opacity-0', 'pointer-events-none');
                hamburger.classList.remove('active');
                document.body.style.overflow = '';
            }
        }

        // Connect Button Event
        document.getElementById('menu-btn').addEventListener('click', toggleMenu);
    </script>



</body>
</html>