<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundsGood - Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/css/pages/_login.css">
</head>
<body>
    <div class="login-container">
        <div class="animation-section" id="animationSection">
            
            <div class="celestial-background">
                <div class="nebula nebula-1"></div>
                <div class="nebula nebula-2"></div>
                <div class="nebula nebula-3"></div>
                
                <div class="celestial-equalizer">
                    <div class="bar bar-1"></div>
                    <div class="bar bar-2"></div>
                    <div class="bar bar-3"></div>
                    <div class="bar bar-4"></div>
                    <div class="bar bar-5"></div>
                </div>
            </div>
        </div>
        
        <div class="form-section" id="formSection">
            <div class="brand-link-container">
                <a href="/" class="brand-link">
                    <i class="fas fa-satellite"></i>
                    <span>SoundsGood</span>
                </a>
            </div>

            <div class="auth-card" id="authCard">
                <div class="card-glow"></div>
                
                <div class="card-content">
                    <div class="form-wrapper" id="loginForm">
                        <div class="form-header">
                            <div class="form-icon">
                                <i class="fas fa-satellite"></i>
                            </div>
                            <h2>Bem-vindo de volta</h2>
                            <p>Faça login para acessar seus sons favoritos</p>
                        </div>

                        @if ($mensagem = Session::get('erro'))
                            {{ $mensagem }}
                        @endif

                        <form class="auth-form" id="loginFormElement" method="POST" action="{{ route('login.auth') }}">
                            @csrf
                            <div class="form-group">
                                <label for="loginEmail" class="form-label">
                                    <i class="fas fa-envelope"></i> Email
                                </label>
                                <input type="email" class="form-control" id="loginEmail" placeholder="seu@email.com" name= "email" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="loginPassword" class="form-label">
                                    <i class="fas fa-lock"></i> Senha
                                </label>
                                <input type="password" class="form-control" id="loginPassword" placeholder="••••••••" name="password" required>
                            </div>
                            
                            <div class="form-remember">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Lembrar-me</label>
                                </div>
                                <a href="#" class="forgot-password">Esqueceu a senha?</a>
                            </div>
                            
                            <button type="submit" class="btn btn-login w-100">
                                <i class="fas fa-sign-in-alt me-2"></i>Entrar
                            </button>
                        </form>
                        
                        <div class="form-footer">
                            <p>Não tem uma conta? <a href="#" id="switchToRegister" class="switch-link">Criar Conta</a></p>
                        </div>
                    </div>
                    
                    <div class="form-wrapper hidden" id="registerForm">
                        <div class="form-header">
                            <div class="form-icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <h2>Junte-se a nós</h2>
                            <p>Crie sua conta e descubra a tranquilidade</p>
                        </div>
                        
                        <form id="FMCadastro_Usuario" method ="POST" action="{{ route('users.store') }}">
                            <div class="form-group">
                                <label for="registerName" class="form-label">
                                    <i class="fas fa-user"></i> Nome Completo
                                </label>
                                <input type="text" class="form-control" id="registerName" placeholder="Seu nome" name ="name" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="registerEmail" class="form-label">
                                    <i class="fas fa-envelope"></i> Email
                                </label>
                                <input type="email" class="form-control" id="registerEmail" placeholder="seu@email.com" name="email"required>
                            </div>
                            
                            <div class="form-group">
                                <label for="registerPassword" class="form-label">
                                    <i class="fas fa-lock"></i> Senha
                                </label>
                                <input type="password" class="form-control" id="registerPassword" placeholder="••••••••" name="password" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="registerConfirmPassword" class="form-label">
                                    <i class="fas fa-lock"></i> Confirmar Senha
                                </label>
                                <input type="password" class="form-control" id="registerConfirmPassword" placeholder="••••••••" required>
                            </div>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="agreeTerms" required>
                                <label class="form-check-label" for="agreeTerms">
                                    Concordo com os <a href="#" class="terms-link">Termos de Serviço</a>
                                </label>
                            </div>
                            
                            <button type="submit" class="btn btn-register w-100">
                                <i class="fas fa-user-plus me-2"></i>Criar Conta
                            </button>
                        </form>
                        
                        <div class="form-footer">
                            <p>Já tem uma conta? <a href="#" id="switchToLogin" class="switch-link">Fazer Login</a></p>
                        </div>
                    </div>
                    
                    <div class="form-divider">
                        <span>ou</span>
                    </div>
                    
                    <div class="social-login">
                        <button type="button" class="btn btn-social" title="Login com Google">
                            <i class="fab fa-google"></i>
                        </button>
                        <button type="button" class="btn btn-social" title="Login com GitHub">
                            <i class="fab fa-github"></i>
                        </button>
                        <button type="button" class="btn btn-social" title="Login com Apple">
                            <i class="fab fa-apple"></i>
                        </button>
                    </div>
                </div>
                </div>
        </div>
    </div>
    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
   <script src="/js/login.js"></script>
</body>
</html>