<x-app-layout>
    <div class="container">
        <div class="row min-vh-100 align-items-center justify-content-center py-4">
            <div class="col-lg-5">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <!-- Header -->
                        <div class="text-center mb-5">
                            <div class="mb-3">
                                <svg class="bi bi-person-plus-fill" width="48" height="48" viewBox="0 0 16 16" fill="currentColor" style="color: #0d6efd;">
                                    <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                    <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
                                </svg>
                            </div>
                            <h1 class="h3 fw-bold mb-1">Registra't</h1>
                            <p class="text-muted">Crea una nova compte</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <!-- Nom -->
                            <div class="mb-3">
                                <label for="name" class="form-label fw-medium">
                                    <svg class="bi bi-person" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm.002 6C10.451 15.357 10.209 15 9.5 15h-3C4.79 15 4.549 15.357 3.998 14c.326-.17.827-.561 1.271-1.031a9.066 9.066 0 0 1 1.79-1.263 2 2 0 0 1 2.882 0 9.066 9.066 0 0 1 1.79 1.263c.444.47.945.861 1.271 1.031ZM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7Z"/>
                                    </svg>
                                    Nom
                                </label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="El teu nom complet" required autofocus autocomplete="name">
                                @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <!-- Correu electrònic -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">
                                    <svg class="bi bi-envelope" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741Z"/>
                                    </svg>
                                    Correu electrònic
                                </label>
                                <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="exemple@correu.com" required autocomplete="username">
                                @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <!-- Contrasenya -->
                            <div class="mb-3">
                                <label for="password" class="form-label fw-medium">
                                    <svg class="bi bi-lock" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.5.12.037.243.05.381.05.119 0 .215-.013.585-.09 1.404-.266 1.605-.288 2.035-.081.387.152.631.373.774.638.088.149.115.383.115.568 0 .14-.08.352-.745 1.368-.848 1.348-1.403 2.269-1.579 2.753-.05.127-.1.248-.159.358.369.035.499.05.637.05.149 0 .257-.007.488-.079 1.687-.379 2.681-1.111 3.224-2.242.388-.859.462-2.659.462-4.423 0-.52-.037-1.04-.111-1.853a196.749 196.749 0 0 0-.064-.559-.107-.288-.146-.332l-.128-.141-.317-.505-.206-.306-.766-1.148-.145-.217c-.16-.24-.33-.515-.45-.65-.027-.03-.05-.058-.076-.088-.088-.1-.372-.467-.6-.8-.23-.338-.435-.63-.663-.932l-.539-.806-.225-.336-.423-.666-.249-.377c-.061-.09-.122-.179-.179-.257-.121-.146-.2-.241-.242-.289-.06-.07-.06-.07-.128-.226-.025-.065-.135-.374-.162-.454-.031-.1-.035-.168-.046-.297-.01-.122-.043-.366-.084-.646-.041-.295-.06-.566-.068-.81-.008-.244-.024-.519-.09-1.079-.045-.416-.053-.607-.053-.932 0-.979.043-1.574.811-2.185.383-.336.738-.63 1.151-.823.58-.245 1.393-.465 2.228-.556.343-.036.701-.043 1.052-.035.703.007 1.692.052 2.695.124 1.003.073 2.013.166 2.723.237.422.036.827.06 1.028.062.112 0 .191-.004.294-.04.097-.03.287-.098.518-.212 1.497-.619 2.265-1.952 2.265-4.155 0-.822-.035-1.659-.175-2.67-.132-.94-.312-1.855-.634-2.846-.31-.934-.676-1.6-1.206-2.122-.52-.504-1.175-.766-2.332-.766-.577 0-1.158.034-1.756.1-.6.066-1.193.15-1.771.255-.577.104-1.141.224-1.69.355-.548.13-1.073.267-1.57.415-1.007.301-1.91.627-2.699 1.04-.789.415-1.45.969-1.989 1.657-.54.688-.88 1.546-.975 2.564-.047.504-.047 1.009-.047 1.519 0 .503 0 1.006.047 1.508.095 1.018.435 1.876.975 2.564.539.688 1.2 1.242 1.989 1.657.789.413 1.692.739 2.699 1.04.497.148 1.022.285 1.57.415.549.13 1.114.25 1.69.355.578.106 1.159.14 1.756.1 1.157-.066 1.812-.328 2.332-.766.53-.522.896-1.188 1.206-2.122.322-.991.502-1.906.634-2.846.14-1.01.175-1.848.175-2.67 0-2.203-.768-3.486-2.265-4.155-.231-.114-.421-.182-.518-.212-.103-.036-.182-.04-.294-.04-.201.002-.606.026-1.028.062-.71.071-1.72.164-2.723.237-.003 0-.007 0-.011 0z"/>
                                    </svg>
                                    Contrasenya
                                </label>
                                <input type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" id="password" name="password" placeholder="Almenys 8 caràcters" required autocomplete="new-password">
                                @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <!-- Confirmació de contrasenya -->
                            <div class="mb-4">
                                <label for="password_confirmation" class="form-label fw-medium">
                                    <svg class="bi bi-lock-check" width="16" height="16" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.5.12.037.243.05.381.05.119 0 .215-.013.585-.09 1.404-.266 1.605-.288 2.035-.081.387.152.631.373.774.638.088.149.115.383.115.568 0 .14-.08.352-.745 1.368-.848 1.348-1.403 2.269-1.579 2.753-.05.127-.1.248-.159.358.369.035.499.05.637.05.149 0 .257-.007.488-.079 1.687-.379 2.681-1.111 3.224-2.242.388-.859.462-2.659.462-4.423 0-.52-.037-1.04-.111-1.853a196.749 196.749 0 0 0-.064-.559-.107-.288-.146-.332l-.128-.141-.317-.505-.206-.306-.766-1.148-.145-.217c-.16-.24-.33-.515-.45-.65-.027-.03-.05-.058-.076-.088-.088-.1-.372-.467-.6-.8-.23-.338-.435-.63-.663-.932l-.539-.806-.225-.336-.423-.666-.249-.377c-.061-.09-.122-.179-.179-.257-.121-.146-.2-.241-.242-.289-.06-.07-.06-.07-.128-.226-.025-.065-.135-.374-.162-.454-.031-.1-.035-.168-.046-.297-.01-.122-.043-.366-.084-.646-.041-.295-.06-.566-.068-.81-.008-.244-.024-.519-.09-1.079-.045-.416-.053-.607-.053-.932 0-.979.043-1.574.811-2.185.383-.336.738-.63 1.151-.823.58-.245 1.393-.465 2.228-.556.343-.036.701-.043 1.052-.035.703.007 1.692.052 2.695.124 1.003.073 2.013.166 2.723.237.422.036.827.06 1.028.062.112 0 .191-.004.294-.04.097-.03.287-.098.518-.212 1.497-.619 2.265-1.952 2.265-4.155 0-.822-.035-1.659-.175-2.67-.132-.94-.312-1.855-.634-2.846-.31-.934-.676-1.6-1.206-2.122-.52-.504-1.175-.766-2.332-.766-.577 0-1.158.034-1.756.1-.6.066-1.193.15-1.771.255-.577.104-1.141.224-1.69.355-.548.13-1.073.267-1.57.415-1.007.301-1.91.627-2.699 1.04-.789.415-1.45.969-1.989 1.657-.54.688-.88 1.546-.975 2.564-.047.504-.047 1.009-.047 1.519 0 .503 0 1.006.047 1.508.095 1.018.435 1.876.975 2.564.539.688 1.2 1.242 1.989 1.657.789.413 1.692.739 2.699 1.04.497.148 1.022.285 1.57.415.549.13 1.114.25 1.69.355.578.106 1.159.14 1.756.1 1.157-.066 1.812-.328 2.332-.766.53-.522.896-1.188 1.206-2.122.322-.991.502-1.906.634-2.846.14-1.01.175-1.848.175-2.67 0-2.203-.768-3.486-2.265-4.155-.231-.114-.421-.182-.518-.212-.103-.036-.182-.04-.294-.04-.201.002-.606.026-1.028.062-.71.071-1.72.164-2.723.237-.003 0-.007 0-.011 0z"/>
                                    </svg>
                                    Confirma la contrasenya
                                </label>
                                <input type="password" class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Repeteix la contrasenya" required autocomplete="new-password">
                                @error('password_confirmation')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <!-- Botó de registre -->
                            <button type="submit" class="btn btn-primary btn-lg w-100 fw-semibold mb-3">
                                <svg class="bi bi-check-circle" width="18" height="18" viewBox="0 0 16 16" fill="currentColor" style="vertical-align: -2px; margin-right: 5px;">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                    <path d="m10.97 4.97-.02.02-3.6 3.85a.75.75 0 0 1-1.08.02l-2.3-2.38a.75.75 0 0 1 1.08-1.04l1.77 1.83 3.12-3.35a.75.75 0 1 1 1.08 1.04z"/>
                                </svg>
                                Registra't
                            </button>

                            <!-- Link de login -->
                            <div class="text-center">
                                <p class="text-muted mb-0">
                                    Ja tins compte?
                                    <a href="{{ route('login') }}" class="text-primary fw-semibold text-decoration-none">Inicia sessió aquí</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
