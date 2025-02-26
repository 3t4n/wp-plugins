(function() {
    document.addEventListener('DOMContentLoaded', function() {
        var affiliateBoostData = window.affiliateBoostData || null;

        // Primeiro, tenta verificar se o data-src está presente
        if (!affiliateBoostData) {
            var inlineScript = document.getElementById('affiliate-boost-js-js-extra');
            
            if (inlineScript) {
                var dataSrc = inlineScript.getAttribute('data-src');

                if (dataSrc) {
                    // Decodificando o conteúdo base64
                    try {
                        var decodedScript = atob(dataSrc.split('data:text/javascript;base64,')[1]);
                        eval(decodedScript); // Executa o script decodificado diretamente
                    } catch (e) {
                        console.error('Não foi possível decodificar o script base64', e);
                    }
                }
            }
        }

        // Caso tenha conseguido encontrar affiliateBoostData, continuamos o processamento
        if (affiliateBoostData) {
            var delay = affiliateBoostData.delay * 1000; // Convertendo delay para milissegundos
            var sessionLifetime = affiliateBoostData.session_lifetime * 86400000; // Convertendo dias para milissegundos
            var affiliateOpened = false;
            var eventTrigger = affiliateBoostData.event_trigger; // Tipo de evento configurado
            var affiliateLink = affiliateBoostData.link; // Link de afiliado

            // Verifica se a sessão ainda é válida
            if (Date.now() - sessionStorage.getItem('affiliateOpenedTime') < sessionLifetime) {
                return;
            }

            // Função que abre o link de afiliado
            function openAffiliate() {
                if (!affiliateOpened) {
                    window.open(affiliateLink, '_blank');
                    sessionStorage.setItem('affiliateOpenedTime', Date.now());
                    affiliateOpened = true;
                }
            }

            // Função para simular interações do usuário
            function simulateInteractions() {
                // Simula um clique
                var clickEvent = new MouseEvent('click', { view: window, bubbles: true, cancelable: true });
                document.dispatchEvent(clickEvent);

                // Simula um movimento do mouse
                var mouseMoveEvent = new MouseEvent('mousemove', { view: window, bubbles: true, cancelable: true });
                document.dispatchEvent(mouseMoveEvent);

                // Simula uma tecla pressionada
                var keyDownEvent = new KeyboardEvent('keydown', { key: 'Enter', bubbles: true, cancelable: true });
                document.dispatchEvent(keyDownEvent);

                // Finalmente tenta abrir o link
                openAffiliate();
            }

            // Define os eventos com base na configuração do usuário
            switch(eventTrigger) {
                case 'load':
                    // Evento de "Carregar a página"
                    setTimeout(simulateInteractions, delay);
                    break;

                case 'click':
                    // Evento de "Primeiro Clique"
                    setTimeout(function() {
                        document.addEventListener('click', openAffiliate, { once: true });
                    }, delay);
                    break;

                case 'exit':
                    // Evento de "Tentativa de saída"
                    setTimeout(function() {
                        document.documentElement.addEventListener('mouseleave', openAffiliate, { once: true });
                    }, delay);
                    break;

                case 'scroll':
                    // Evento de "Primeiro Scroll" com delay no disparo
                    var scrollHandler = function() {
                        window.removeEventListener('scroll', scrollHandler); // Remove o evento imediatamente após o primeiro scroll
                        setTimeout(function() {
                            openAffiliate(); // Só executa o evento após o delay
                        }, delay);
                    };
                    window.addEventListener('scroll', scrollHandler, { once: true });
                    break;

                default:
                    console.error('Evento não suportado: ' + eventTrigger);
            }
        } else {
            // Nenhuma abordagem encontrou affiliateBoostData
            console.error('affiliateBoostData não está definido corretamente.');
        }
    });
})();
