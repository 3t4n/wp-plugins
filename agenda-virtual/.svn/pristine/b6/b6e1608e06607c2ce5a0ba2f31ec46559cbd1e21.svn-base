if (agendaVirtualVisible.visible == 1) {
  var botao_av = document.createElement('a');
  botao_av.id = 'botao-agendavirtual';
  botao_av.href = "https://agendavirtual.net/app/" + agendaVirtualData.url;
  botao_av.target = '_blank';
  botao_av.classList.add('botao-agendavirtual');

  // Define o conteúdo interno do elemento 'a' como o código SVG
  botao_av.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Free 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2023 Fonticons, Inc. --><path d="M128 0c17.7 0 32 14.3 32 32V64H288V32c0-17.7 14.3-32 32-32s32 14.3 32 32V64h48c26.5 0 48 21.5 48 48v48H0V112C0 85.5 21.5 64 48 64H96V32c0-17.7 14.3-32 32-32zM0 192H448V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V192zM329 305c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0l-95 95-47-47c-9.4-9.4-24.6-9.4-33.9 0s-9.4 24.6 0 33.9l64 64c9.4 9.4 24.6 9.4 33.9 0L329 305z"/></svg>';
  
  var cor = agendaVirtualDataCor.cor;
  botao_av.style.backgroundColor = cor;
  
  // adiciona a classe CSS de acordo com a posição escolhida no form
  var position = agendaVirtualDataPosition.position;
  switch (position) {
    case 'inferior_direito':
      botao_av.classList.add('botao-agendavirtual-inferior-direito');
      break;
    case 'inferior_esquerdo':
      botao_av.classList.add('botao-agendavirtual-inferior-esquerdo');
      break;
    case 'superior_direito':
      botao_av.classList.add('botao-agendavirtual-superior-direito');
      break;
    case 'superior_esquerdo':
      botao_av.classList.add('botao-agendavirtual-superior-esquerdo');
      break;
    default:
      botao_av.classList.add('botao-agendavirtual-inferior-direito');
  }

  document.body.appendChild(botao_av);
}
