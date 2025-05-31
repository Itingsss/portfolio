<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fazry Achbar Winandha | Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/three@0.132.2/build/three.min.js"></script>
    <script src="https://unpkg.com/three@0.132.2/examples/js/controls/OrbitControls.js"></script>
    <script src="https://unpkg.com/three@0.132.2/examples/js/loaders/GLTFLoader.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Add jQuery and Toastr for notifications -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: #0a0a0a;
            color: #e5e5e5;
            overflow-x: hidden;
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .glow {
            text-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }
        
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.3);
        }
        
        .badge {
            transition: all 0.3s ease;
        }
        
        .badge:hover {
            transform: scale(1.05);
        }
        
        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        #hero-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }
        
        .skill-badge {
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .skill-badge:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
        }
        
        .floating {
            animation: floating 6s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        .typewriter {
            overflow: hidden;
            border-right: .15em solid #3b82f6;
            white-space: nowrap;
            margin: 0 auto;
            letter-spacing: .15em;
        }
        
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: #3b82f6; }
        }
        
        .hexagon {
            clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
        }
        
        .hexagon-container {
            perspective: 1000px;
        }
        
        .hexagon-inner {
            transition: transform 0.5s;
            transform-style: preserve-3d;
        }
        
        .hexagon-container:hover .hexagon-inner {
            transform: rotateY(180deg);
        }
        
        .hexagon-front, .hexagon-back {
            backface-visibility: hidden;
            position: absolute;
            width: 100%;
            height: 100%;
        }
        
        .hexagon-back {
            transform: rotateY(180deg);
        }
        
        /* Toastr customization */
        .toast {
            background-color: #1e293b !important;
            border-left: 4px solid #3b82f6 !important;
        }
        
        .toast-success {
            border-left-color: #10b981 !important;
        }
        
        .toast-error {
            border-left-color: #ef4444 !important;
        }
        
        /* Mobile menu styles */
        .mobile-menu {
            display: none;
            position: absolute;
            top: 16px;
            right: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            backdrop-filter: blur(10px);
            z-index: 40;
            padding: 1rem;
            border-radius: 0.5rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }
        
        .mobile-menu.active {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .mobile-menu a {
            display: block;
            padding: 0.75rem 1rem;
            color: #e5e5e5;
            border-radius: 0.375rem;
            transition: all 0.3s ease;
        }
        
        .mobile-menu a:hover {
            background-color: rgba(59, 130, 246, 0.2);
            color: white;
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Particles Background -->
    <div id="particles-js"></div>
    
    <!-- 3D Animation Canvas -->
    <canvas id="hero-canvas"></canvas>
    
    <!-- Navigation -->
    <nav class="fixed w-full z-50 bg-black bg-opacity-80 backdrop-filter backdrop-blur-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-white text-xl font-bold gradient-text">FAW</span>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="#home" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300">Home</a>
                        <a href="#about" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300">About</a>
                        <a href="#skills" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300">Skills</a>
                        <a href="#stats" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300">Stats</a>
                        <a href="#contact" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-all duration-300">Contact</a>
                    </div>
                </div>
                <div class="md:hidden">
                    <button id="mobileMenuButton" class="mobile-menu-button p-2 rounded-md text-gray-400 hover:text-white focus:outline-none">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobileMenu" class="mobile-menu md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="#home" class="block px-3 py-2 rounded-md text-base font-medium">Home</a>
                <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium">About</a>
                <a href="#skills" class="block px-3 py-2 rounded-md text-base font-medium">Skills</a>
                <a href="#stats" class="block px-3 py-2 rounded-md text-base font-medium">Stats</a>
                <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium">Contact</a>
            </div>
        </div>
    </nav>
    
    <!-- Hero Section -->
    <section id="home" class="relative min-h-screen flex items-center justify-center pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left">
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 glow">
                        <span class="gradient-text">Hello, I'm Fazry Achbar Winandha</span>
                    </h1>
                    <div id="typingContainer" class="h-10 mb-6">
                        <h2 id="typingText" class="text-xl md:text-2xl font-semibold text-gray-300 typewriter"></h2>
                    </div>
                    <p class="text-lg text-gray-400 mb-8 max-w-lg">
                        Passionate developer specializing in backend systems, mobile applications, cybersecurity, bug hunter, and tool developer/software tools engineer. Currently working on Pentrazy AI and diving deep into Deep Learning & AI.
                    </p>
                    <div class="flex flex-wrap gap-4 justify-center md:justify-start">
                        <a href="#contact" class="px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full text-white font-medium hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-105">
                            Contact Me
                        </a>
                        <a href="#about" class="px-6 py-3 border border-gray-700 rounded-full text-white font-medium hover:bg-gray-800 transition-all duration-300 transform hover:scale-105">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="relative flex justify-center">
                    <div class="hexagon-container w-64 h-64 md:w-80 md:h-80">
                        <div class="hexagon-inner w-full h-full">
                            <div class="hexagon-front hexagon bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">
                                <img src="https://i.supaimg.com/72305b24-9673-4fc6-a37c-8544c793f8ac.png" alt="Profile" class="hexagon w-full h-full object-cover">
                            </div>
                            <div class="hexagon-back hexagon bg-gradient-to-br from-purple-600 to-pink-500 flex items-center justify-center">
                                <div class="text-center p-4">
                                    <h3 class="text-xl font-bold text-white mb-2">Fazry Achbar Winandha</h3>
                                    <p class="text-gray-200">Full Stack Developer</p>
                                    <div class="mt-4 flex justify-center space-x-3">
                                        <a href="https://github.com/Itingsss" class="text-white hover:text-blue-300"><i class="fab fa-github fa-lg"></i></a>
                                        <a href="https://www.linkedin.com/in/fazry-achbar-winandha-6690a2369?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="text-white hover:text-blue-400"><i class="fab fa-linkedin fa-lg"></i></a>
                                        <a href="mailto:fajri123tq@gmail.com" class="text-white hover:text-red-400"><i class="fab fa-google fa-lg"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-900 bg-opacity-50 backdrop-filter backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="gradient-text">About Me</span>
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="bg-gray-800 bg-opacity-50 p-6 rounded-xl border border-gray-700 card-hover">
                        <h3 class="text-xl font-semibold text-white mb-3">🔭 Currently Working On</h3>
                        <p class="text-gray-300">Projek Pentrazy AI</p>
                    </div>
                    
                    <div class="bg-gray-800 bg-opacity-50 p-6 rounded-xl border border-gray-700 card-hover">
                        <h3 class="text-xl font-semibold text-white mb-3">🌱 Currently Learning</h3>
                        <p class="text-gray-300">Deep Learning & Artificial Intelligence (AI)</p>
                    </div>
                    
                    <div class="bg-gray-800 bg-opacity-50 p-6 rounded-xl border border-gray-700 card-hover">
                        <h3 class="text-xl font-semibold text-white mb-3">👯 Looking to Collaborate On</h3>
                        <p class="text-gray-300">Projek Website & Projek Open-Source</p>
                    </div>
                </div>
                
                <div class="space-y-6">
                    <div class="bg-gray-800 bg-opacity-50 p-6 rounded-xl border border-gray-700 card-hover">
                        <h3 class="text-xl font-semibold text-white mb-3">💬 Ask Me About</h3>
                        <p class="text-gray-300">My specific expertise areas</p>
                    </div>
                    
                    <div class="bg-gray-800 bg-opacity-50 p-6 rounded-xl border border-gray-700 card-hover">
                        <h3 class="text-xl font-semibold text-white mb-3">📫 How to Reach Me</h3>
                        <p class="text-gray-300">fajri123tq@gmail.com</p>
                    </div>
                    
                    <div class="bg-gray-800 bg-opacity-50 p-6 rounded-xl border border-gray-700 card-hover">
                        <h3 class="text-xl font-semibold text-white mb-3">⚡ Fun Fact</h3>
                        <p class="text-gray-300">I've been learning Cyber Security and How to be a Developer since 8th grade of junior high school</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Skills Section -->
    <section id="skills" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="gradient-text">My Skills</span>
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
            </div>
            
            <!-- Programming Languages -->
            <div class="mb-12">
                <h3 class="text-2xl font-semibold text-white mb-6 text-center md:text-left">Programming Languages</h3>
                <div class="flex flex-wrap justify-center gap-3">
                    <span class="skill-badge px-4 py-2 bg-[#F7DF1E] text-black rounded-full font-medium">JavaScript</span>
                    <span class="skill-badge px-4 py-2 bg-[#3776AB] text-white rounded-full font-medium">Python</span>
                    <span class="skill-badge px-4 py-2 bg-[#007396] text-white rounded-full font-medium">Java</span>
                    <span class="skill-badge px-4 py-2 bg-[#00ADD8] text-white rounded-full font-medium">Go</span>
                    <span class="skill-badge px-4 py-2 bg-[#39457E] text-white rounded-full font-medium">Perl</span>
                    <span class="skill-badge px-4 py-2 bg-[#CC342D] text-white rounded-full font-medium">Ruby</span>
                    <span class="skill-badge px-4 py-2 bg-[#777BB4] text-white rounded-full font-medium">PHP</span>
                    <span class="skill-badge px-4 py-2 bg-[#4EAA25] text-white rounded-full font-medium">Bash</span>
                    <span class="skill-badge px-4 py-2 bg-[#005C9C] text-white rounded-full font-medium">XML</span>
                </div>
            </div>
            
            <!-- Frontend -->
            <div class="mb-12">
                <h3 class="text-2xl font-semibold text-white mb-6 text-center md:text-left">Frontend</h3>
                <div class="flex flex-wrap justify-center gap-3">
                    <span class="skill-badge px-4 py-2 bg-[#61DAFB] text-black rounded-full font-medium">React</span>
                    <span class="skill-badge px-4 py-2 bg-[#000000] text-white rounded-full font-medium">Next.js</span>
                    <span class="skill-badge px-4 py-2 bg-[#7952B3] text-white rounded-full font-medium">Bootstrap</span>
                    <span class="skill-badge px-4 py-2 bg-[#06B6D4] text-white rounded-full font-medium">TailwindCSS</span>
                </div>
            </div>
            
            <!-- Backend -->
            <div class="mb-12">
                <h3 class="text-2xl font-semibold text-white mb-6 text-center md:text-left">Backend</h3>
                <div class="flex flex-wrap justify-center gap-3">
                    <span class="skill-badge px-4 py-2 bg-[#339933] text-white rounded-full font-medium">Node.js</span>
                    <span class="skill-badge px-4 py-2 bg-[#000000] text-white rounded-full font-medium">Express</span>
                    <span class="skill-badge px-4 py-2 bg-[#FF2D20] text-white rounded-full font-medium">Laravel</span>
                    <span class="skill-badge px-4 py-2 bg-[#00ADD8] text-white rounded-full font-medium">Go Backend</span>
                    <span class="skill-badge px-4 py-2 bg-[#CC0000] text-white rounded-full font-medium">Ruby on Rails</span>
                    <span class="skill-badge px-4 py-2 bg-[#3776AB] text-white rounded-full font-medium">Python Backend</span>
                    <span class="skill-badge px-4 py-2 bg-[#777BB4] text-white rounded-full font-medium">PHP Backend</span>
                </div>
            </div>
            
            <!-- Database -->
            <div class="mb-12">
                <h3 class="text-2xl font-semibold text-white mb-6 text-center md:text-left">Database</h3>
                <div class="flex flex-wrap justify-center gap-3">
                    <span class="skill-badge px-4 py-2 bg-[#47A248] text-white rounded-full font-medium">MongoDB</span>
                    <span class="skill-badge px-4 py-2 bg-[#4479A1] text-white rounded-full font-medium">MySQL</span>
                </div>
            </div>
            
            <!-- DevOps & Tools -->
            <div class="mb-12">
                <h3 class="text-2xl font-semibold text-white mb-6 text-center md:text-left">DevOps & Tools</h3>
                <div class="flex flex-wrap justify-center gap-3">
                    <span class="skill-badge px-4 py-2 bg-[#2496ED] text-white rounded-full font-medium">Docker</span>
                    <span class="skill-badge px-4 py-2 bg-[#F05032] text-white rounded-full font-medium">Git</span>
                    <span class="skill-badge px-4 py-2 bg-[#181717] text-white rounded-full font-medium">GitHub</span>
                    <span class="skill-badge px-4 py-2 bg-[#007ACC] text-white rounded-full font-medium">VS Code</span>
                    <span class="skill-badge px-4 py-2 bg-[#3DDC84] text-white rounded-full font-medium">Android Studio</span>
                    <span class="skill-badge px-4 py-2 bg-[#CB3837] text-white rounded-full font-medium">NPM</span>
                    <span class="skill-badge px-4 py-2 bg-[#000000] text-white rounded-full font-medium">Termux</span>
                    <span class="skill-badge px-4 py-2 bg-[#005F9E] text-white rounded-full font-medium">SketchUp</span>
                    <span class="skill-badge px-4 py-2 bg-[#FF6B6B] text-white rounded-full font-medium">SketchWare</span>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Stats Section -->
    <section id="stats" class="py-20 bg-gray-900 bg-opacity-50 backdrop-filter backdrop-blur-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="gradient-text">GitHub Statistics</span>
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-800 bg-opacity-50 p-6 rounded-xl border border-gray-700 card-hover">
                    <img src="https://github-readme-stats.vercel.app/api?username=Itingsss&show_icons=true&theme=radical&hide_border=true" alt="GitHub Stats" class="w-full h-auto">
                </div>
                <div class="bg-gray-800 bg-opacity-50 p-6 rounded-xl border border-gray-700 card-hover">
                    <img src="https://github-readme-stats.vercel.app/api/top-langs/?username=Itingsss&layout=compact&theme=radical&hide_border=true" alt="Top Languages" class="w-full h-auto">
                </div>
            </div>
            
            <div class="mt-12 bg-gray-800 bg-opacity-50 p-6 rounded-xl border border-gray-700 card-hover">
                <img src="https://github-profile-trophy.vercel.app/?username=Itingsss&theme=onedark&no-frame=true&row=2&column=4" alt="GitHub Trophies" class="w-full h-auto">
            </div>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact" class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    <span class="gradient-text">Get In Touch</span>
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-purple-600 mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-semibold text-white mb-6">Contact Information</h3>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-500 bg-opacity-20 rounded-full mr-4">
                                <i class="fas fa-envelope text-blue-400 text-xl"></i>
                            </div>
                            <div>
                                <p class="text-gray-400">Email</p>
                                <a href="mailto:fajri123tq@gmail.com" class="text-white hover:text-blue-400 transition-colors duration-300">fajri123tq@gmail.com</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h3 class="text-2xl font-semibold text-white mb-6">Social Media</h3>
                        <div class="flex space-x-4">
                            <a href="https://www.linkedin.com/in/fazry-achbar-winandha-6690a2369?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="social-icon p-3 bg-blue-700 bg-opacity-20 rounded-full hover:bg-opacity-40 transition-all duration-300">
                                <i class="fab fa-linkedin-in text-blue-400 text-xl"></i>
                            </a>
                            <a href="https://jriajahh.netlify.app" class="social-icon p-3 bg-orange-600 bg-opacity-20 rounded-full hover:bg-opacity-40 transition-all duration-300">
                                <i class="fas fa-globe text-orange-400 text-xl"></i>
                            </a>
                            <a href="mailto:fajri123tq@gmail.com" class="social-icon p-3 bg-red-600 bg-opacity-20 rounded-full hover:bg-opacity-40 transition-all duration-300">
                                <i class="fas fa-envelope text-red-400 text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div>
                    <form id="contactForm" class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-300 mb-1">Name</label>
                            <input type="text" id="name" name="name" required class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition-all duration-300">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email</label>
                            <input type="email" id="email" name="email" required class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition-all duration-300">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-300 mb-1">Message</label>
                            <textarea id="message" name="message" rows="4" required class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-white placeholder-gray-500 transition-all duration-300"></textarea>
                        </div>
                        <button type="submit" id="submitBtn" class="w-full px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg text-white font-medium hover:from-blue-600 hover:to-purple-700 transition-all duration-300 transform hover:scale-[1.02]">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer -->
    <footer class="py-8 bg-black bg-opacity-80 backdrop-filter backdrop-blur-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <span class="text-white text-lg font-bold gradient-text">Fazry Achbar Winandha</span>
                </div>
                <div class="flex space-x-6">
                    <a href="https://github.com/Itingsss" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/fazry-achbar-winandha-6690a2369?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                    <a href="mailto:fajri123tq@gmail.com" class="text-gray-400 hover:text-white transition-colors duration-300">
                        <i class="fab fa-google fa-lg"></i>
                    </a>
                </div>
            </div>
            <div class="mt-8 text-center text-gray-500 text-sm">
                <p>© 2025 Fazry Achbar Winandha. All rights reserved.</p>
            </div>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        // Typing animation for the hero section
        const typingText = document.getElementById('typingText');
        const texts = ["BackEnd Developer", "Mobile Developer", "Cyber Security", "Bug Hunter", "Tool Developer"];
        let textIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let typingSpeed = 100; // milliseconds per character
        
        function typeWriter() {
            const currentText = texts[textIndex];
            
            if (isDeleting) {
                // Deleting text
                typingText.textContent = currentText.substring(0, charIndex - 1);
                charIndex--;
                typingSpeed = 50; // Faster when deleting
            } else {
                // Typing text
                typingText.textContent = currentText.substring(0, charIndex + 1);
                charIndex++;
                typingSpeed = 100; // Normal speed when typing
            }
            
            // Check if we've finished typing or deleting
            if (!isDeleting && charIndex === currentText.length) {
                // Pause at end of typing
                isDeleting = true;
                typingSpeed = 1500; // Pause for 1.5 seconds
            } else if (isDeleting && charIndex === 0) {
                // Move to next text after deleting
                isDeleting = false;
                textIndex = (textIndex + 1) % texts.length;
                typingSpeed = 500; // Pause before typing next text
            }
            
            setTimeout(typeWriter, typingSpeed);
        }
        
        // Start the typing animation
        setTimeout(typeWriter, 1000); // Initial delay
        
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobileMenuButton');
        const mobileMenu = document.getElementById('mobileMenu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            
            // Change icon based on menu state
            const icon = mobileMenuButton.querySelector('svg');
            if (mobileMenu.classList.contains('active')) {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />';
            } else {
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
            }
        });
        
        // Close mobile menu when clicking on a link
        document.querySelectorAll('#mobileMenu a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                const icon = mobileMenuButton.querySelector('svg');
                icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />';
            });
        });
        
        // Configure Toastr notifications
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        // Form submission handler
        $(document).ready(function() {
            $('#contactForm').submit(function(e) {
                e.preventDefault();
                
                // Get form data
                const formData = {
                    name: $('#name').val(),
                    email: $('#email').val(),
                    message: $('#message').val()
                };
                
                // Disable submit button and show loading state
                $('#submitBtn').html('<i class="fas fa-spinner fa-spin mr-2"></i> Sending...');
                $('#submitBtn').prop('disabled', true);
                
                // Here you would normally make an AJAX call to your backend
                // For demonstration, we'll simulate a successful submission after 1.5 seconds
                setTimeout(function() {
                    // Simulate successful submission (replace with actual AJAX call)
                    const isSuccess = Math.random() > 0.2; // 80% chance of success for demo
                    
                    if (isSuccess) {
                        // Success notification
                        toastr.success('Your message has been sent successfully!', 'Success');
                        
                        // Reset form
                        $('#contactForm')[0].reset();
                    } else {
                        // Error notification
                        toastr.error('Failed to send message. Please try again later.', 'Error');
                    }
                    
                    // Re-enable submit button
                    $('#submitBtn').html('Send Message');
                    $('#submitBtn').prop('disabled', false);
                }, 1500);
            });
        });

        // Rest of your JavaScript (particles.js, Three.js, etc.) remains the same
        // Particles.js configuration
        particlesJS("particles-js", {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#3b82f6"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    }
                },
                "opacity": {
                    "value": 0.5,
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#3b82f6",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 2,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "grab"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 140,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
        
        // 3D Animation with Three.js
        const canvas = document.getElementById('hero-canvas');
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);
        
        // Add lights
        const ambientLight = new THREE.AmbientLight(0x404040);
        scene.add(ambientLight);
        
        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.5);
        directionalLight.position.set(1, 1, 1);
        scene.add(directionalLight);
        
        // Add floating objects
        const geometry = new THREE.IcosahedronGeometry(1, 0);
        const material = new THREE.MeshPhongMaterial({ 
            color: 0x3b82f6,
            transparent: true,
            opacity: 0.8,
            wireframe: true
        });
        
        const objects = [];
        for (let i = 0; i < 5; i++) {
            const mesh = new THREE.Mesh(geometry, material);
            mesh.position.x = (Math.random() - 0.5) * 10;
            mesh.position.y = (Math.random() - 0.5) * 10;
            mesh.position.z = (Math.random() - 0.5) * 10;
            mesh.scale.setScalar(Math.random() * 0.5 + 0.5);
            scene.add(mesh);
            objects.push(mesh);
        }
        
        camera.position.z = 5;
        
        // Animation loop
        function animate() {
            requestAnimationFrame(animate);
            
            objects.forEach(obj => {
                obj.rotation.x += 0.005;
                obj.rotation.y += 0.01;
            });
            
            renderer.render(scene, camera);
        }
        
        animate();
        
        // Handle window resize
        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });
        
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>
</html>