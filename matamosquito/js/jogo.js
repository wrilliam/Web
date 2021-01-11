var largura = 0
var altura = 0
var hp = 1
var tempo = 10
var intervaloMosquito = 1500

var nivel = window.location.search
nivel = nivel.replace('?', '')
if(nivel === 'dificil')
	intervaloMosquito = 1000
else if(nivel === 'asiatico')
	intervaloMosquito = 750

function tamanhoTela() {
	largura = window.innerWidth
	altura = window.innerHeight
}

tamanhoTela()

var timer = setInterval(function() {
	tempo--
	if(tempo < 0) {
		clearInterval(timer)
		clearInterval(criaMosquito)
		window.location.href = 'stage_clear.html'
	} else {
		document.getElementById('timer').innerHTML = tempo
	}
}, 1000)

function posicaoMosquito() {
	if(document.getElementById('mosquito')) {
		document.getElementById('mosquito').remove()
		if(hp > 3) {
			window.location.href = 'game_over.html'
		} else {
			document.getElementById('hp' + hp).src = 'img/coracao_vazio.png'
			hp++
		}
	}

	var posX = Math.floor(Math.random() * largura) - 90
	var posY = Math.floor(Math.random() * altura) - 90

	posX = posX < 0 ? 0 : posX
	posY = posY < 0 ? 0 : posY

	var mosquito = document.createElement('img')
	mosquito.src = 'img/mosquito.png'
	mosquito.className = tamanhoMosquito() + ' ' + sentidoMosquito()
	mosquito.style.left = posX + 'px'
	mosquito.style.top = posY + 'px'
	mosquito.style.position = 'absolute'
	mosquito.id = 'mosquito'
	mosquito.onclick = function() {
		this.remove()
	}

	document.body.appendChild(mosquito)
}

function tamanhoMosquito() {
	var classe = Math.floor(Math.random() * 3) + 1
	var nome = 'mosquito' + classe
	return nome
}

function sentidoMosquito() {
	var classe = Math.floor(Math.random() * 2)
	switch(classe) {
		case 0: return 'esquerda'
		case 1: return 'direita'
	}
}