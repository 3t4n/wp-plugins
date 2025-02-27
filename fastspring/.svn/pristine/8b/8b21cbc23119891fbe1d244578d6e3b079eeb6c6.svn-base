
document.addEventListener('click', function (event)
	{
		if (event.target.matches('.fsb-close'))
		{
			event.preventDefault();
			fastspring_closeitall();
			return
		}
		if(event.target.hasAttribute('data-fsc-addthis'))
		{
			var product = event.target.getAttribute("data-fsc-addthis");
			var cart = event.target.getAttribute("data-fsc-cart");
			fastspring_addProd(product, cart);
			return
		}
		if(event.target.hasAttribute('data-fsc-opencart'))
		{
			event.preventDefault();
			fastspring_openCart(event.target.getAttribute("data-fsc-opencart"));
			return
		}
		if(event.target.hasAttribute('data-fsc-toggle')) {
			event.preventDefault();
			var modal = event.target.getAttribute("data-fsc-target");
			var element = document.querySelector(modal);
			element.classList.add('show');		
			element.style.display = 'block';				
		}
		if(event.target.hasAttribute('role')) {
			event.preventDefault();
			var modal = event.target.getAttribute("role");
			event.target.classList.remove('show');		
			event.target.style.display = 'none';
		}
		if(event.target.hasAttribute('data-fsc-dismiss')) {
			event.preventDefault();
			modal = event.target.getAttribute("data-fsc-dismiss");
			var element = document.querySelector("#" + modal);
			element.classList.remove('show');		
			element.style.display = 'none';
			
			
		}
		return
	}, 
false);
	
	

var translations = {
	en: {
		applyCouponText: "Apply",
		cartTitleText: "Shopping Cart",
		checkoutText: "Checkout",
		continueShoppingText: "Continue Shopping",
		couponLabelText: "Enter Promotional Code",
		couponPlaceholderText: "Coupon Code",
		crossSellText: "Add to cart",
		crossSellTitleText: "You may also be interested in...",
		dayText: "day",
		daysText: "days",
		edsText: "Add to cart",
		freeText: "Free",
		monthText: "month",
		monthsText: "months",
		nextChargeText: "Next charge:",
		onText: "on",
		orderEmptyText: "Your Order Is Empty",
		orderTotalText: "Total",
		removeText: "Remove",
		renewsEveryText: "Renews every ",
		renewsAutomaticallyText: "Renews automatically by the seller",
		renewsAlongWithSubscriptionText: "Renews along with subscription",
		shippingText: "Shipping:",
		upSellText: "Upgrade",
		viewDetailsText: "View Details",
		volumeDiscountsAvailableText: "Volume Discounts Available",
		weekText: "week",
		weeksText: "weeks",
		yearText: "year",
		yearsText: "years",
		youSaveText: "You Save"
	},
	da: {
		applyCouponText: "Anvend",
		cartTitleText: "Indkøbskurv",
		checkoutText: "Bestilling",
		continueShoppingText: "Fortsætte med at handle",
		couponLabelText: "Indtast kuponkode",
		couponPlaceholderText: "Kuponkode",
		crossSellText: "Tilføj til kurv",
		crossSellTitleText: "Du kan også være interesseret i ...",
		dayText: "dag",
		daysText: "dage",
		edsText: "Tilføj til kurv",
		freeText: "Gratis",
		monthText: "måned",
		monthsText: "måned",
		nextChargeText: "Næste opkrævning:",
		onText: "d",
		orderEmptyText: "Din ordre er tom",
		orderTotalText: "Total",
		removeText: "Fjern",
		renewsEveryText: "Fornyer hver ",
		renewsAutomaticallyText: "Fornyes automatisk af forhandleren",
		renewsAlongWithSubscriptionText: "Fornyer sammen med abonnement",
		shippingText: "Forsendelse",
		upSellText: "Opgrader",
		viewDetailsText: "Vis detaljer",
		volumeDiscountsAvailableText: "M\u00e6ngderabat tilg\u00e6ngelig",
		weekText: "uge",
		weeksText: "uger",
		yearText: "år",
		yearsText: "år",
		youSaveText: "Du sparer"
	},
	de: {
		applyCouponText: "Einlösen",
		cartTitleText: "Einkaufswagen",
		checkoutText: "Auschecken",
		continueShoppingText: "Mit dem Einkaufen fortfahren",
		couponLabelText: "Geben Sie einen Rabattcode ein",
		couponPlaceholderText: "Rabattcode",
		crossSellText: "In den Warenkorb legen",
		crossSellTitleText: "Sie könnten auch interessiert sein an ...",
		dayText: "Tag",
		daysText: "Tage",
		edsText: "In den Warenkorb legen",
		freeText: "Kostenlos",
		monthText: "Monat",
		monthsText: "Monate",
		nextChargeText: "Nächste Abbuchung:",
		onText: "am",
		orderEmptyText: "Ihre Bestellung ist leer",
		orderTotalText: "Summe",
		removeText: "Entfernen",
		renewsEveryText: "Wird verlängert",
		renewsAutomaticallyText: "Wird vom Verkäufer automatisch verlängert",
		renewsAlongWithSubscriptionText: "Wird zusammen mit Abonnement erneuert",
		shippingText: "Versand",
		upSellText: "Aktualisierung",
		viewDetailsText: "Details anzeigen",
		volumeDiscountsAvailableText: "Mengenrabatte verf\u00fcgbar",
		weekText: "Woche",
		weeksText: "Wochen",
		yearText: "Jahr",
		yearsText: "Jahre",
		youSaveText: "Sie sparen"
	},
	es: {
		applyCouponText: "Aplicar",
		cartTitleText: "Carrito de compras",
		checkoutText: "Revisa",
		continueShoppingText: "Seguir comprando",
		couponLabelText: "Introducir Código promocional",
		couponPlaceholderText: "Código promocional",
		crossSellText: "Añadir al carrito",
		crossSellTitleText: "Usted también podría estar interesado en...",
		dayText: "día",
		daysText: "días",
		edsText: "Añadir al carrito",
		freeText: "Gratis",
		monthText: "mes",
		monthsText: "meses",
		nextChargeText: "Siguiente cargo:",
		onText: "el",
		orderEmptyText: "Su pedido está vacío",
		orderTotalText: "Total",
		removeText: "Eliminar",
		renewsEveryText: "renueva cada ",
		renewsAutomaticallyText: "Renueva automáticamente por el vendedor",
		renewsAlongWithSubscriptionText: "Renovaciones con la suscripción",
		shippingText: "Envío",
		upSellText: "Potenciar",
		viewDetailsText: "Ver los detalles",
		volumeDiscountsAvailableText: "Descuentos por volumen disponibles",
		weekText: "semana",
		weeksText: "semanas",
		yearText: "año",
		yearsText: "años",
		youSaveText: "Usted Ahorra"
	},
	fi: {
		applyCouponText: "Ota käyttöön",
		cartTitleText: "Ostoskärry",
		checkoutText: "Tarkista",
		continueShoppingText: "Jatka ostoksia",
		couponLabelText: "Anna kuponkikoodi",
		couponPlaceholderText: "Kuponkikoodi",
		crossSellText: "Lisää ostoskoriin",
		crossSellTitleText: "Saatat myös olla kiinnostunut ...",
		dayText: "päivä",
		daysText: "päivää",
		edsText: "Lisää ostoskoriin",
		freeText: "Ilmainen",
		monthText: "kuukausi",
		monthsText: "kuukautta",
		nextChargeText: "Seuraava maksu:",
		onText: "päivämääränä",
		orderEmptyText: "Tilauksesi on tyhjä",
		orderTotalText: "Loppusumma",
		removeText: "Poista",
		renewsEveryText: "Uusiutuu joka ",
		renewsAutomaticallyText: "Myyjä uusii tilauksen automaattisesti",
		renewsAlongWithSubscriptionText: "Uusiutuu tilauksen ohella",
		shippingText: "Laivaus",
		upSellText: "Päivitys",
		viewDetailsText: "Näytä tiedot",
		volumeDiscountsAvailableText: "K\u00e4ytett\u00e4viss\u00e4 olevat paljousalennukset",
		weekText: "viikko",
		weeksText: "viikkoa",
		yearText: "vuosi",
		yearsText: "vuotta",
		youSaveText: "Säästät"
	},
	fr: {
		applyCouponText: "Appliquer",
		cartTitleText: "Panier",
		checkoutText: "Check-out",
		continueShoppingText: "Continuer vos achats",
		couponLabelText: "Entrez le code promotionnel",
		couponPlaceholderText: "Code promotionnel",
		crossSellText: "Ajouter au chariot",
		crossSellTitleText: "Vous pourriez également être intéressé par ...",
		dayText: "jour",
		daysText: "jours",
		edsText: "Ajouter au chariot",
		freeText: "Gratuit",
		monthText: "mois",
		monthsText: "mois",
		nextChargeText: "Prochains frais:",
		onText: "le",
		orderEmptyText: "Il n'y a aucune commande",
		orderTotalText: "Total",
		removeText: "Supprimer",
		renewsEveryText: "Se renouvelle toutes les ",
		renewsAutomaticallyText: "Se renouvelle automatiquement par le vendeur",
		renewsAlongWithSubscriptionText: "Renouveler avec une souscription",
		shippingText: "Livraison",
		upSellText: "Améliorer",
		viewDetailsText: "Voir les détails",
		volumeDiscountsAvailableText: "Remises sur gros volume disponibles",
		weekText: "semaine",
		weeksText: "semaines",
		yearText: "années",
		yearsText: "années",
		youSaveText: "Vous économisez"
	},
	hr: {
		applyCouponText: "Primjeni postavke",
		cartTitleText: "Košarica",
		checkoutText: "Provjeri",
		continueShoppingText: "Nastaviti s kupovinom",
		couponLabelText: "Unesi Promotivni Kod",
		couponPlaceholderText: "Kod za Popust",
		crossSellText: "Dodaj u košaricu",
		crossSellTitleText: "Možda će vas zanimati i ...",
		dayText: "dan",
		daysText: "dana",
		edsText: "Dodaj u košaricu",
		freeText: "Besplatno",
		monthText: "mjesec",
		monthsText: "mjesečno",
		nextChargeText: "Slijedeća naplata:",
		onText: "Uključeno",
		orderEmptyText: "Vaša Narudžba je Prazna",
		orderTotalText: "Sveukupno",
		removeText: "Ukloni",
		renewsEveryText: "Obnavlja se svakih ",
		renewsAutomaticallyText: "Renouvelle automatiquement par le vendeur",
		renewsAlongWithSubscriptionText: "Obnavlja se zajedno sa pretplatom",
		shippingText: "Dostava",
		upSellText: "Nadogradnja",
		viewDetailsText: "Pogledaj Detalje",
		volumeDiscountsAvailableText: "Koli\u010dinski Popusti su Dostupni",
		weekText: "tjedan",
		weeksText: "tjedno",
		yearText: "godina",
		yearsText: "godina",
		youSaveText: "Ušteda"
	},
	it: {
		applyCouponText: "Applica",
		cartTitleText: "Carrello della spesa",
		checkoutText: "Check-out",
		continueShoppingText: "Continua a fare acquisti",
		couponLabelText: "Inserisci il codice coupon",
		couponPlaceholderText: "Codice coupon",
		crossSellText: "Aggiungi al carrello",
		crossSellTitleText: "Potrebbe interessarti anche ...",
		dayText: "giorno",
		daysText: "giorni",
		edsText: "Aggiungi al carrello",
		freeText: "Gratuito",
		monthText: "mese",
		monthsText: "mesi",
		nextChargeText: "Prossimo addebito:",
		onText: "il",
		orderEmptyText: "Il tuo ordine è vuoto",
		orderTotalText: "Totale",
		removeText: "Rimuovi",
		renewsEveryText: "Si rinnova ogni ",
		renewsAutomaticallyText: "Si rinnova automaticamente dal venditore",
		renewsAlongWithSubscriptionText: "Si rinnova insieme all'abbonamento",
		shippingText: "Spedizione",
		upSellText: "Aggiornamento",
		viewDetailsText: "Visualizza dettagli",
		volumeDiscountsAvailableText: "Disponibili sconti quantit\u00e0",
		weekText: "settimana",
		weeksText: "settimane",
		yearText: "anno",
		yearsText: "anni",
		youSaveText: "Risparmi"
	},
	ja: {
		applyCouponText: "適用",
		cartTitleText: "ショッピングカート",
		checkoutText: "チェックアウト",
		continueShoppingText: "ショッピングを続ける",
		couponLabelText: "プロモーション コードを入力",
		couponPlaceholderText: "プロモーション コード",
		crossSellText: "カートに追加",
		crossSellTitleText: "また興味があるかもしれません...",
		dayText: "日",
		daysText: "日",
		edsText: "カートに追加",
		freeText: "無料",
		monthText: "月",
		monthsText: "月",
		nextChargeText: "次回の課金:",
		onText: "で",
		orderEmptyText: "注文が空です",
		orderTotalText: "合計",
		removeText: "削除",
		renewsEveryText: "すべて更新 ",
		renewsAutomaticallyText: "販売者によって自動的に更新します。",
		renewsAlongWithSubscriptionText: "サブスクリプションに従い更新します",
		shippingText: "運送",
		upSellText: "アップグレード",
		viewDetailsText: "詳細を閲覧",
		volumeDiscountsAvailableText: "数量割引",
		weekText: "週",
		weeksText: "週",
		yearText: "年",
		yearsText: "年",
		youSaveText: "割引"
	},
	ko: {
		applyCouponText: "적용하기",
		cartTitleText: "쇼핑 카트",
		checkoutText: "점검",
		continueShoppingText: "쇼핑을 계속",
		couponLabelText: "프로모션 코드 입력하기",
		couponPlaceholderText: "쿠폰 코드",
		crossSellText: "장바구니에 담기",
		crossSellTitleText: "당신은 또한 관심이있을 수 있습니다 ...",
		dayText: "일",
		daysText: "일",
		edsText: "장바구니에 담기",
		freeText: "무료",
		monthText: "개월",
		monthsText: "개월",
		nextChargeText: "다음 청구:",
		onText: "~에",
		orderEmptyText: "주문이 비어 있습니다",
		orderTotalText: "합계",
		removeText: "제거하기",
		renewsEveryText: " 마다 갱신",
		renewsAutomaticallyText: "판매자가 자동으로 갱신",
		renewsAlongWithSubscriptionText: "구독과 함께 갱신",
		shippingText: "배송",
		upSellText: "업그레이드",
		viewDetailsText: "세부 정보 보기",
		volumeDiscountsAvailableText: "대량 구매 할인 가능",
		weekText: "주",
		weeksText: "주",
		yearText: "년",
		yearsText: "년",
		youSaveText: "~을 절약합니다"
	},
	nl: {
		applyCouponText:"Pas toe",
		cartTitleText:"Winkelwagen",
		checkoutText:"uitchecken",
		continueShoppingText: "Doorgaan met winkelen",
		couponLabelText:"Voer couponcode in",
		couponPlaceholderText:"Couponcode",
		crossSellText:"Voeg toe aan winkelwagen",
		crossSellTitleText:"Misschien ben je ook geïnteresseerd in ...",
		dayText:"dagen",
		daysText:"dagen",
		edsText:"Voeg toe aan winkelwagen",
		freeText:"Gratis",
		monthText:"maanden",
		monthsText:"maanden",
		nextChargeText:":Volgende aanrekening:",
		onText:":op",
		orderEmptyText:":Uw bestelling is leeg",
		orderTotalText:":Totaal",
		removeText:":Verwijder",
		renewsEveryText:":Hernieuwt elke",
		renewsAutomaticallyText:":Hernieuwt automatisch door de verkoper",
		renewsAlongWithSubscriptionText:":Vernieuwt samen met abonnement",
		shippingText:"scheepvaart",
		upSellText:"Upgrade",
		viewDetailsText:"Bekijk Details",
		volumeDiscountsAvailableText: "Volumekortingen beschikbaar",
		weekText:":weken",
		weeksText:":weken",
		yearText:":jaren",
		yearsText:":jaren",
		youSaveText:":U bespaart"
	},
	no: {
		applyCouponText:"Bruk",
		cartTitleText:"Handlevogn",
		checkoutText:"Sjekk ut",
		continueShoppingText: "Fortsette å handle",
		couponLabelText:"Oppgi kupongkode",
		couponPlaceholderText:"Kupongkode",
		crossSellText:"Legg i handlekurv",
		crossSellTitleText:"Du kan også være interessert i ...",
		dayText:"dag",
		daysText:"dager",
		edsText:"Legg i handlekurv",
		freeText:"Gratis",
		monthText:"måned",
		monthsText:"måneder",
		nextChargeText:":Neste belastning:",
		onText:":på",
		orderEmptyText:":Bestillingen din er tom",
		orderTotalText:":Sum",
		removeText:":Fjern",
		renewsEveryText:":Fornyes hver",
		renewsAutomaticallyText:":Fornyes automatisk av selger",
		renewsAlongWithSubscriptionText:":Fornyes samtidig som abonnement",
		shippingText:"Shipping",
		upSellText:"Oppgradering",
		viewDetailsText:"Se detaljer",
		volumeDiscountsAvailableText: "Mengderabatter tilgjengelig",
		weekText:":uke",
		weeksText:":uker",
		yearText:":år",
		yearsText:":år",
		youSaveText:":Du sparer"
	},
	pt: {
		applyCouponText: "Usar",
		cartTitleText: "Carrinho de compras",
		checkoutText: "Verificação de saída",
		continueShoppingText: "Continue comprando",
		couponLabelText: "Inserir código do cupão",
		couponPlaceholderText: "Código do cupão",
		crossSellText: "Adicionar ao carrinho",
		crossSellTitleText: "Talvez você também esteja interessado em ...",
		dayText: "dia",
		daysText: "dias",
		edsText: "Adicionar ao carrinho",
		freeText: "Gratuito",
		monthText: "mês",
		monthsText: "meses",
		nextChargeText: "Próxima cobrança:",
		onText: "em",
		orderEmptyText: "O Seu Pedido Está Vazio",
		orderTotalText: "Total",
		removeText: "Remover",
		renewsEveryText: "Renova todas ",
		renewsAutomaticallyText: "Renovação automática pelo vendedor",
		renewsAlongWithSubscriptionText: "Renova em conjunto com a subscrição",
		shippingText: "Remessa",
		upSellText: "Melhoria",
		viewDetailsText: "Ver Detalhes",
		volumeDiscountsAvailableText: "Descontos Dispon\u00edveis para Quantidades",
		weekText: "semana",
		weeksText: "semanas",
		yearText: "ano",
		yearsText: "anos",
		youSaveText: "Vai poupar"
	},
	ru: {
		applyCouponText: "Применить",
		cartTitleText: "Корзина",
		checkoutText: "контроль",
		continueShoppingText: "Продолжить покупки",
		couponLabelText: "Введите код купона",
		couponPlaceholderText: "Код купона",
		crossSellText: "Добавить в корзину",
		crossSellTitleText: "Вы также можете быть заинтересованы в ...",
		dayText: "день",
		daysText: "дней",
		edsText: "Добавить в корзину",
		freeText: "Бесплатно",
		monthText: "месяц",
		monthsText: "месяцев",
		nextChargeText: "Следующая оплата:",
		onText: "на",
		orderEmptyText: "Ваш заказ пуст",
		orderTotalText: "Всего",
		removeText: "Удалить",
		renewsEveryText: "Возобновляется каждый ",
		renewsAutomaticallyText: "Автоматически возобновляется продавцом",
		renewsAlongWithSubscriptionText: "Обновляется вместе с подпиской",
		shippingText: "Перевозка",
		upSellText: "Обновить",
		viewDetailsText: "Посмотреть детали",
		volumeDiscountsAvailableText: "Объем доступных скидок",
		weekText: "неделю",
		weeksText: "недель",
		yearText: "год",
		yearsText: "лет",
		youSaveText: "Вы экономите"
	},
	sv: {
		applyCouponText: "Använd",
		cartTitleText: "Kundvagn",
		checkoutText: "Kassa",
		continueShoppingText: "Fortsätt handla",
		couponLabelText: "Ange rabattkod",
		couponPlaceholderText: "Rabattkod",
		crossSellText: "Lägg till i kundvagn",
		crossSellTitleText: "Du kanske också är intresserad av ...",
		dayText: "dag",
		daysText: "dagar",
		edsText: "Lägg till i kundvagn",
		freeText: "Gratis",
		monthText: "månad",
		monthsText: "månader",
		nextChargeText: "Nästa debitering:",
		onText: "på",
		orderEmptyText: "Din beställning innehåller inget",
		orderTotalText: "Totalsumma",
		removeText: "Ta bort",
		renewsEveryText: "Förnyas varje ",
		renewsAutomaticallyText: "Förnyas automatiskt av säljaren",
		renewsAlongWithSubscriptionText: "Förnyas tillsammans med prenumeration",
		shippingText: "Frakt",
		upSellText: "Uppgradering",
		viewDetailsText: "Visa information",
		volumeDiscountsAvailableText: "M\u00e4ngdrabatt tillg\u00e4nglig",
		weekText: "vecka",
		weeksText: "veckor",
		yearText: "år",
		yearsText: "år",
		youSaveText: "Du sparar"
	},
	zh: {
		applyCouponText: "应用",
		cartTitleText: "购物车",
		checkoutText: "查看",
		continueShoppingText: "继续购物",
		couponLabelText: "输入优惠码",
		couponPlaceholderText: "优惠码",
		crossSellText: "添加到购物车",
		crossSellTitleText: "您也可能对。。。有兴趣...",
		dayText: "天",
		daysText: "天",
		edsText: "添加到购物车",
		freeText: "免费",
		monthText: "月",
		monthsText: "月",
		nextChargeText: "下一个收费：",
		onText: "开",
		orderEmptyText: "您的订单是空的",
		orderTotalText: "总计",
		removeText: "移除",
		renewsEveryText: "每 更新",
		renewsAutomaticallyText: "卖家进行自动更新",
		renewsAlongWithSubscriptionText: "随订阅进行更新",
		shippingText: "运输",
		upSellText: "升级",
		viewDetailsText: "查看详情",
		volumeDiscountsAvailableText: "批量折扣可用",
		weekText: "周",
		weeksText: "周",
		yearText: "年",
		yearsText: "年",
		youSaveText: "您节省"
	}
};

setDefaultGeneral("enableTranslations", false);
setDefaultGeneral("loadFA", true);
setDefaultGeneral("enableGA", false);
setDefaultGeneral("enableCart", true);
setDefaultGeneral("cartType", "modal");
setDefaultGeneral("standAloneCartPage","");
setDefaultGeneral("showPromo", true);
setDefaultGeneral("cartHeaderBGColor", "");
setDefaultGeneral("cartHeaderTextColor", "");
setDefaultGeneral("applyCouponButtonClass", "fastspring_btn fastspring_btn-success");
setDefaultGeneral("checkoutButtonClass", "fastspring_btn fastspring_btn-success");
setDefaultGeneral("crossSellButtonClass", "fastspring_btn fastspring_btn-success");
setDefaultGeneral("upSellButtonClass", "fastspring_btn fastspring_btn-success");
setDefaultGeneral("edsButtonClass", "fastspring_btn fastspring_btn-success");
setDefaultGeneral("continueShoppingButtonClass", "fastspring_btn fastspring_btn-success");
setDefaultGeneral("enableMiniCart", true);
setDefaultGeneral("miniCartLocation", "bottomright");
setDefaultGeneral("miniCartBubbleColor", "");
setDefaultGeneral("miniCartCheckoutBGColor", "");
setDefaultGeneral("miniCartCheckoutTextColor", "");
setDefaultGeneral("miniCartCheckoutBGColorHover", "");
setDefaultGeneral("miniCartCheckoutTextColorHover", "");
setDefaultGeneral("popupClosedRedirectURL", "");
setDefaultGeneral("popupClosedRedirectParameter", "orderReference");
setDefaultGeneralIcon("removeIcon","none");
setDefaultGeneralIcon("applyCouponButtonIcon","none");
setDefaultGeneralIcon("checkoutButtonIcon","none");
setDefaultGeneralIcon("crossSellButtonIcon","none");
setDefaultGeneralIcon("upSellButtonIcon","none");
setDefaultGeneralIcon("edsButtonIcon","none");
setDefaultGeneralIcon("miniCartIcon", "cart");
setDefaultGeneralIcon("continueShoppingButtonIcon","none");

if(enableCart) {

	var script = document.createElement("script");
	script.innerHTML = `{{#iff context "==" "allProducts"}}
	{{#if description.summary}}
		{{#iff context "!=" "Interupt"}}
			{{{truncate description.summary 75}}}<br />
		{{/iff}}
	{{/if}}					
{{/iff}}
{{#if description.summary}}
	<a href="#" class="mb-2" data-fsc-toggle="modal" data-fsc-target="#{{path}}Modal" style="display:block;" data-fsb-viewDetails>View Details</a>
{{else}}
	{{#if description.full}}
		<a href="#" class="mb-2" data-fsc-toggle="modal" data-fsc-target="#{{path}}Modal" style="display:block;" data-fsb-viewDetails>View Details</a>
	{{/if}}
{{/if}}`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "moreInfo");
	script.id = "moreInfo";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `<div class="row">
	<div class="col-md-11 offset-md-1">
		<div class="card mt-2 mb-3">
			<div class="card-header">
				{{display}}&nbsp;
			</div>
			<div class="card-body pb-0">
				{{#each items}}
					<div class="row mb-4">
						<div class="col-1 text-center">
							{{#if selected}}
								<input class="fsb-option-input fsb-checkbox" type="checkbox" name="{{display}}" id="{{path}}" checked data-fsc-action="Remove" data-fsc-item-path-value="{{path}}">
							{{else}}
								<input class="fsb-option-input fsb-checkbox" type="checkbox" name="{{display}}" id="{{path}}" data-fsc-action="Add" data-fsc-item-path-value="{{path}}">
							{{/if}}
						</div>
						{{#if image}}
							<div class="fsb-ximage col-2 col-xl-1 m-0 p-0 hide-mini">
								<img src="{{image}}" class="img-fluid fsb-ximage pr-2" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
							</div>
						{{/if}}
						<div class="col">	
							<p class="fsb-display m-0">{{display}}</p>
							{{>moreInfo}}
							{{>pricing}}<br />
							{{>quantity}}
						</div>
						<div class="col-3 text-right">
							{{#if selected}}
								<strong>
									{{#iff totalValue ">" "0"}}
										{{total}}
									{{else}}
										<span data-fsb-free>Free</span>
									{{/iff}}
								</strong>
							{{else}}
								---
							{{/if}}
						</div>
					</div>
					<hr />
				{{/each}}
			</div>
		</div>
	</div>
</div>`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "multiChoice");
	script.id = "multiChoice";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `<div class="row">
	<div class="col-md-11 offset-md-1">
		<div class="card mt-2 mb-3">
			<div class="card-header">
				{{display}}&nbsp;
			</div>
			<div class="card-body pb-0">
				{{#each items}}
					<div class="row mb-4">
						<div class="col-1 text-center ">
							{{#if selected}}
								<input class="fsb-option-input fsb-checkbox" type="checkbox" name="{{display}}" id="{{path}}" checked data-fsc-action="Remove" data-fsc-item-path-value="{{path}}">
								
							{{else}}
								<input class="fsb-option-input fsb-checkbox" type="checkbox" name="{{display}}" id="{{path}}" data-fsc-action="Add" data-fsc-item-path-value="{{path}}">
							{{/if}}
						</div>
						{{#if image}}
							<div class="fsb-ximage col-2 col-xl-1 m-0 p-0 hide-mini">
								<img src="{{image}}" class="img-fluid fsb-ximage pr-2" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
							</div>
						{{/if}}
						<div class="col">
							<p class="fsb-display m-0">{{display}}</p>
							{{>moreInfo}}
							<span class="pricing">
								{{#if discountTotalValue}}
									<p class=" fsb-inline-item originalPrice"><s>{{price}}</s></p>
								{{/if}}
								{{#iff totalValue ">" "0"}}
									<p class=" fsb-inline-item price">{{unitPrice}}</p>
								{{else}}
									<p class=" fsb-inline-item text-success price" data-fsb-free> Free</p>
								{{/iff}}
							</span>
							<br />
							{{#if selected}}
								{{#iff pricing.quantity "==" "allow"}}
									<div class="fsb-number">
										 <span class="fsb-minus"><span class="fastspring_circle minus"></span></span>
											<input class="fsb-qtyinput" type="text" value="{{quantity}}" data-fsc-autoapply data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Update"/>
										<span class="fsb-plus"><span class="fastspring_circle plus"></span></span>
									</div>
								{{/iff}}
								{{#iff pricing.quantity "==" "lock"}}
									<p class="fsb-multiply fsb-inline-item">{{quantity}}</p>
								{{/iff}}
							{{/if}}
							{{>volumeDiscount}}
							<div>
								<em style="font-size:75%;">
									<span data-fsb-renewsAlongWithSubscription>Renews along with subscription</span>
								</em>
							</div>
						</div>
						<div class="col-3 text-right">
							{{#if selected}}
								<strong>
									{{#iff totalValue ">" "0"}}
										{{total}}
									{{else}}
										<span data-fsb-free>Free</span>
									{{/iff}}
								</strong>
							{{else}}
								---
							{{/if}}
						</div>
					</div>
					<hr />
				{{/each}}
			</div>
		</div>
	</div>
</div>`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "multiChoiceAddon");
	script.id = "multiChoiceAddon";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `<span class="pricing">
	{{#if discountTotalValue}}
		<p class=" fsb-inline-item originalPrice"><s>{{price}}</s></p>
	{{/if}}
	{{#iff totalValue ">" "0"}}
		<p class=" fsb-inline-item price">{{unitPrice}}</p>
	{{else}}
		<p class=" fsb-inline-item text-success price" data-fsb-free>Free</p>
	{{/iff}}
	{{#if subscription}}
		<div class="mb-2">
			<em style="font-size:75%;">
				{{#iff subscription.intervalUnit "==" "adhoc"}}
					<span data-fsb-renewsAutomatically>Renews automatically by the seller</span>
				{{else}}
					<span data-fsb-renewsEvery>Renews every </span>
				{{#iff subscription.intervalLength ">=" "2" }}
					{{subscription.intervalLength}} 
					{{#iff subscription.intervalUnit "==" "day"}}
						<span data-fsb-days>days</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "week"}}
						<span data-fsb-weeks>weeks</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "month"}}
						<span data-fsb-months>months</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "year"}}
						<span data-fsb-years>years</span>
					{{/iff}}	
				{{/iff}}
				{{#iff subscription.intervalLength "==" "1" }}
					{{#iff subscription.intervalUnit "==" "day"}}
						<span data-fsb-day>day</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "week"}}
						<span data-fsb-week>week</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "month"}}
						<span data-fsb-month>month</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "year"}}
						<span data-fsb-year>year</span>
					{{/iff}}
				{{/iff}}.
				<br /><span data-fsb-nextCharge>Next charge:</span> {{subscription.nextChargeTotal}} <span data-fsb-on>on</span> {{subscription.nextChargeDate}}
				{{/iff}}
			</em>
		</div>
	{{/if}}
</span>`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "pricing");
	script.id = "pricing";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `<div class="modal fade " id="{{path}}{{context}}Modal" tabindex="-1" role="dialog" aria-labelledby="portfolioModal1Label" aria-hidden="true">
	<div class="modal-dialog modal-lg shadow-lg modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="fsb-modal-header">
				<a href="#" data-fsc-dismiss="{{path}}{{context}}Modal" id="fsb-close" class="close fsb-cart_title m-0" aria-label="Close" style="float: right;">&times;</a>
				<span class="fsb-cart_title m-0" >{{display}}</span>
			</div>
			<div class="modal-body">
				<div class="container">
					<div class="row justify-content-center">
						{{#if image}}
							<div class="col-4">
								<img src="{{image}}" class="img-fluid pr-2" alt="{{display}}" />
							</div>
						{{/if}}
						<div class="col">
							<h2 class="portfolio-modal-title text-secondary text-uppercase mb-2">{{display}}</h2>
							{{>pricing}}
							{{>volumeDiscount}}
							{{{description.summary}}}
							{{{description.full}}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "productModal");
	script.id = "productModal";
	document.body.appendChild(script);
	
	var script = document.createElement("script");
	script.innerHTML = `{{#if selected}}
	{{#iff pricing.quantity "==" "allow"}}
		<div class="fsb-number">
			<span class="fsb-minus"><span class="fastspring_circle minus"></span></span>
				<input class="fsb-qtyinput" type="text" value="{{quantity}}" data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" onchange="fastspring_changeQty(this);" />
			<span class="fsb-plus"><span class="fastspring_circle plus"></span></span>
		</div>
	{{/iff}}
	{{#if subscription}}
		<div>
			<em style="font-size:75%;">
				{{#iff subscription.intervalUnit "==" "adhoc"}}
					<span data-fsb-renewsAutomatically>Renews automatically by the seller</span>
				{{else}}
					<span data-fsb-renewsEvery>Renews every </span>
				{{#iff subscription.intervalLength ">=" "2" }}
					{{subscription.intervalLength}}
					{{#iff subscription.intervalUnit "==" "day"}}
						<span data-fsb-days>days</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "week"}}
						<span data-fsb-weeks>weeks</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "month"}}
						<span data-fsb-months>months</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "year"}}
						<span data-fsb-years>years</span>
					{{/iff}}								
				{{/iff}}
				{{#iff subscription.intervalLength "==" "1" }}
					{{#iff subscription.intervalUnit "==" "day"}}
						<span data-fsb-day>day</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "week"}}
						<span data-fsb-week>week</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "month"}}
						<span data-fsb-month>month</span>
					{{/iff}}
					{{#iff subscription.intervalUnit "==" "year"}}
						<span data-fsb-year>year</span>
					{{/iff}}		
				{{/iff}}
				<br /><span data-fsb-nextCharge>Next charge:</span> {{subscription.nextChargeTotal}} <span data-fsb-on>on</span> {{subscription.nextChargeDate}}
				{{/iff}}
			</em>
		</div>
	{{/if}}
	
{{/if}}`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "quantity");
	script.id = "quantity";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `<div class="row">
	<div class="col-md-11 offset-md-1">
		<div class="card mt-2 mb-3">
			<div class="card-header">
				{{display}}&nbsp;
			</div>
			<div class="card-body pb-0">
				{{#each items}}
					<div class="row mb-4">
						<div class="col-1 text-center"><input class="fsb-option-input fsb-radio" type="radio" {{#if selected}} checked{{/if}} name="{{display}}" id="{{path}}" data-fsc-action="Add" data-fsc-item-path-value="{{path}}" ></div>
						{{#if image}}
							<div class="fsb-ximage col-2 col-xl-1 m-0 p-0 hide-mini">
								<img src="{{image}}" class="img-fluid fsb-ximage pr-2" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
							</div>
						{{/if}}
						<div class="col">
							<p class="fsb-display m-0">{{display}}</p>
							{{>pricing}}<br />
							{{>quantity}}
						</div>
						<div class="col-3 text-right">
							{{#if selected}}
								<strong>
									{{#iff totalValue ">" "0"}}
										{{total}}
									{{else}}
										<span data-fsb-free>Free</span>
									{{/iff}}
								</strong>
							{{else}}
										---
							{{/if}}
						</div>
					</div>
					<hr />
				{{/each}}
			</div>
		</div>
	</div>
</div>	`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "singleChoice");
	script.id = "singleChoice";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `<div class="row">
	<div class="col-md-11 offset-md-1">
		<div class="card mt-2 mb-3">
			<div class="card-header">
				{{display}}&nbsp;
			</div>
			<div class="card-body pb-0">
				{{#each items}}
					<div class="row mb-4">
						<div class="col-1 text-center"><input class="fsb-option-input fsb-radio" type="radio" {{#if selected}} checked{{/if}} name="{{display}}" id="{{path}}" data-fsc-action="Add" data-fsc-item-path-value="{{path}}" ></div>
						{{#if image}}
							<div class="fsb-ximage col-2 col-xl-1 m-0 p-0 hide-mini">
								<img src="{{image}}" class="img-fluid fsb-ximage pr-2" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
							</div>
						{{/if}}
						<div class="col">
							<p class="fsb-display m-0">{{display}}</p>
							{{>moreInfo}}
							<span class="pricing">
								{{#if discountTotalValue}}
									<p class=" fsb-inline-item originalPrice"><s>{{price}}</s></p>
								{{/if}}
								{{#iff totalValue ">" "0"}}
									<p class=" fsb-inline-item price">{{unitPrice}}</p>
								{{else}}
									<p class=" fsb-inline-item text-success price" data-fsb-free>Free</p>
								{{/iff}}
							</span>
							<br />
							{{#if selected}}
								{{#iff pricing.quantity "==" "allow"}}
									<div class="fsb-number">
										<span class="fsb-minus"><span class="fastspring_circle minus"></span></span>
											<input class="fsb-qtyinput" type="text" value="{{quantity}}" data-fsc-autoapply data-fsc-item-quantity-value data-fsc-item-quantity data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Update"/>
										<span class="fsb-plus"><span class="fastspring_circle plus"></span></span>
									</div>
								{{/iff}}
								{{#iff pricing.quantity "==" "lock"}}
									<p class="fsb-multiply fsb-inline-item">{{quantity}}</p>
								{{/iff}}
							{{/if}}
							{{>volumeDiscount}}
							<div>
								<em style="font-size:75%;">
									<span data-fsb-renewsAlongWithSubscription>Renews along with subscription</span>
								</em>
							</div>
						</div>
						<div class="col-3 text-right">
							{{#if selected}}
								<strong>
									{{#iff totalValue ">" "0"}}
										{{total}}
									{{else}}
										<span data-fsb-free>Free</span>
									{{/iff}}
								</strong>
							{{else}}
										---
							{{/if}}
						</div>
					</div>
					<hr />
				{{/each}}
			</div>
		</div>
	</div>
</div>`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "singleChoiceAddon");
	script.id = "singleChoiceAddon";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `<div class="row">
	<div class="col-md-11 offset-md-1">
		<div class="card mt-2 mb-3">
			<div class="card-header">
				{{display}}&nbsp;
			</div>
			<div class="card-body pb-0">
				{{#each items}}
					{{#iff selected "==" false}}
						<div class="row mb-4">
							{{#if image}}
								<div class="fsb-ximage col-3 col-md-2 hide-mini">
									<img src="{{image}}" class="img-fluid fsb-ximage pr-2" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
								</div>
							{{/if}}
							<div class="col">
								<p class="fsb-display">{{display}}</p>
								{{>moreInfo}}
								{{>pricing}}
								{{>volumeDiscount}}
							</div>
							<div class="col-sm-4 col-6 text-right">
								<button type="button" data-fsb-upSellButtonClass data-fsc-item-path-value="{{path}}" data-fsc-action="Add">
									{{#if description.action}}{{description.action}}{{else}}<span data-fsb-upSell>Add to cart</span>{{/if}} <i data-fsb-upSellButtonIcon></i>
								</button>
							</div>
						</div>
						<hr />
					{{/iff}}
				{{/each}}
			</div>
		</div>
	</div>
</div>`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "upSell");
	script.id = "upSell";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `{{#if discountTotalValue}}
	<div class="yousave">
		<span data-fsb-youSave>You Save</span> {{discountTotal}} ({{discountPercent}})
		{{#if discount.reason}}
			<p>{{discount.reason}}</p>
		{{/if}}
	</div>
{{/if}}
{{#if discount.data.tiers}}
	<div class="yousave my-1">
		<strong data-fsb-volumeDiscountsAvailable></strong>
		{{#each discount.data.tiers}}
			<div>
				{{quantity}}+ : {{percent}}{{amount}} off
			</div>
		{{/each}}
	</div>
{{/if}}`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "volumeDiscount");
	script.id = "volumeDiscount";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `{{#each order}}
	{{#each allCrossSells}}
		{{#iff @index "==" 0}}
			<h4 data-fsb-crossSellTitle>You may also be interested in...</h4>
			<div class="row hide-mini mb-4">
		{{/iff}}
			{{#iff @root.order.0.allCrossSells.length ">" 5}}
				<div class="xsellrow col-sm-6 col-md-3 text-center mb-4">
			{{else}}
				{{#iff @root.order.0.allCrossSells.length ">" 3}}
					<div class="xsellrow col-md-3 text-center mb-4">
				{{else}}
					{{#iff @root.order.0.allCrossSells.length "==" 3}}
						<div class="xsellrow col-md-4 text-center mb-4">
					{{else}}
						{{#iff @root.order.0.allCrossSells.length "==" 2}}
							<div class="col-md-6 text-center mb-4">
						{{else}}
							<div class="col-md-12 text-center mb-4">
						{{/iff}}
					{{/iff}}
				{{/iff}}
			{{/iff}}
			<div class="col-xs-12 border p-3 fsb-rounded h100">
				<img data-fsc-item-path="{{path}}" data-fsc-item-image class="xsellimg"  data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal">
				<span class="displayname"><p class="name" data-fsc-item-path="{{path}}" data-fsc-item-path-value="{{path}}" data-fsc-item-display></p></span>
				{{>pricing}}
				{{>moreInfo}}
				<span data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-item-selection-smartdisplay-inverse >
					<a data-fsb-crossSellButtonClass data-fsc-item-path="{{path}}" data-fsc-item-path-value="{{path}}" data-fsc-action="Add">
						<span data-fsc-item-path="{{path}}" data-fsc-item-description-action>
							<span data-fsb-crossSell>Add to cart</span>
						</span>
						 <i data-fsb-crossSellButtonIcon></i>
					</a>
				</span>
			</div>
		</div>			
	{{/each}}
	{{#if allCrossSells}}
		</div>
	{{/if}}
{{/each}}	
{{#each order}}
	{{#each allCrossSells}}
		{{#iff @index "==" 0}}
			<div class="row show-mini">
		{{/iff}}
		<div class="col-md-6 text-center mb-4">
			<div class="col-xs-12 border p-3 fsb-rounded h100">
				<img data-fsc-item-path="{{path}}" data-fsc-item-image class="xsellimg"  data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal">
				<span class="displayname"><p class="name" data-fsc-item-path="{{path}}" data-fsc-item-path-value="{{path}}" data-fsc-item-display></p></span>
				{{>pricing}}
				{{>moreInfo}}
				<span data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-item-selection-smartdisplay-inverse>
					<a data-fsb-crossSellButtonClass data-fsc-item-path="{{path}}" data-fsc-item-path-value="{{path}}" data-fsc-action="Add">
						<span data-fsc-item-path="{{path}}" data-fsc-item-description-action>
							<span data-fsb-crossSell>Add to cart</span>
						</span>
						 <i data-fsb-crossSellButtonIcon></i>
					</a>
				</span>
			</div>
		</div>			
	{{/each}}
	{{#if allCrossSells}}
		</div>
	{{/if}}
{{/each}}`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "xSell");
	script.id = "xSell";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `<span data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-item-selection-smartdisplay-inverse style="display: block;">
	<a class="btn btn-success addcartbutton" data-fsc-addthis="{{path}}" data-fsc-item-path="{{path}}" data-fsc-item-description-action>
		Add to Cart
	</a>
</span>
<span data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-item-selection-smartdisplay style="display:none;">
	<button class="btn btn-success viewcartbutton" onclick="fastspring_openCart();">
		View Cart
	</button>
</span>`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "addToCart");
	script.id = "addToCart";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `{{#each groups}}
	{{#each items}}
		{{>productModal}}
		{{#each groups}}
			{{#each items}}
				{{>productModal}}
			{{/each}}
		{{/each}}
	{{/each}}
{{/each}}`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "cartModals");
	script.id = "cartModals";
	document.body.appendChild(script);

	var script = document.createElement("script");
	script.innerHTML = `<div class="fsb-modal-header">
	<a id="fsb-close" class="close fsb-close fsb-cart_title m-0" aria-label="Close">
		&times;
	</a>
	<span class="fsb-cart_title m-0" data-fsb-cartTitle>
		Shopping Cart
	</span>
</div>
<div class="fsb-modal-body" {{#each order}}{{#unless selections}} style="overflow-y:auto !important; max-height: calc(100vh - (20px * 2));"{{/unless}}{{/each}}>
	<div id="fsb_error" class="fsb-alert fsb-alert-danger" role="alert">
		<p class="fsb-alert-heading">
			<strong>
				I"m sorry, there was an issue.
			</strong>
		</p>
		<p id="fsb_error_msg">
		</p>
	</div>
	<div id="fsb" data-fsc-selections-smartdisplay>
		<div class="container-fluid">
			<div class="row align-items-center mb-4">
				{{#each items}}
					{{#each items}}
						{{#iff path "!=" "SystemExtension.shippingcalculation"}}
							<div class="col-lg-12 fsb-border mb-4 fsb-rounded">
								<div class="row mt-4 mb-4">
									<div class="col-md-9 col-8">
										<div class="show-mini-block">
											<div class="row">
												{{#if image}}
													<div class="col-3">
														<img src="{{image}}" class="img-fluid" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
													</div>
												{{/if}}
												<div class="col">
													<p class="fsb-display p-0 m-0">
														{{display}}														
													</p>
													{{>moreInfo}}
													{{>quantity}}<br />
													{{>pricing}}
													{{>volumeDiscount}}
												</div>
											</div>
										</div>
										<div class="hide-mini">
											<div class="row">
												{{#if image}}
													<div class="fsb-ximage col-3 col-md-2">
														<img src="{{image}}" class="img-fluid fsb-ximage pr-2" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
													</div>
												{{/if}}
												<div class="col">
													<p class="fsb-display p-0 m-0">
														{{display}}
													</p>
													{{>moreInfo}}
													{{>quantity}}
													{{>volumeDiscount}}
												</div>
												<div class="col-md-3 d-xs-none d-sm-none d-md-block">
													{{#if discountTotalValue}}
														<p class=" fsb-inline-item originalPrice"><s>{{price}}</s></p>
													{{/if}}
													{{#iff totalValue ">" "0"}}
														<p class=" fsb-inline-item price">{{unitPrice}}</p>
													{{else}}
														<p class=" fsb-inline-item text-success price" data-fsb-free>Free</p>
													{{/iff}}
													</span> &times;
													<span data-fsc-item-path="{{path}}" data-fsc-item-quantity>
													</span>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-4 text-right">
										<p class="fsb-extPrice text-nowrap m-0">
											{{#iff totalValue ">" "0"}}
												{{total}}
												{{else}}
												<span data-fsb-free>Free</span>
											{{/iff}}
											
											{{#if removable}}
												<a href="#" class="removeText" data-fsc-action="Remove" data-fsc-item-path-value="{{path}}">
													<span class="removeNone"><br /><span data-fsb-remove>Remove</span></span>
													<i data-fsb-removeIcon></i>
												</a>
											{{/if}}
										</p>
										
									</div>
								</div>
								{{#each groups}}
									{{#iff type "==" "replace"}}
										{{#iff selectableReplacements "==" true}}
											{{>upSell}}
										{{/iff}}
									{{/iff}}
									{{#iff type "==" "bundle"}}
										<div class="row">
											<div class="col offset-md-1">
												<div class="card mt-2 mb-3">
													<div class="card-header">
														{{display}} includes the following:
													</div>
													<div class="card-body pb-4">
														{{#each items}}
															{{#if image}}
																<img src="{{image}}" class="fsb-bundleimage" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
															{{/if}}
														{{/each}}
													</div>
												</div>
											</div>
										</div>
									{{/iff}}
									{{#iff type "==" "options"}}
										<div class="row">
											<div class="col-md-11 offset-md-1">
												<div class="card mt-2 mb-3">
													<div class="card-header">
														{{display}}&nbsp;
													</div>
													<div class="card-body pb-0">
														{{#each items}}
														<div class="row mb-4">
															<div class="col-1">
																<input class="fsb-option-input fsb-radio" type="radio" {{#if selected}} checked{{/if}} name="{{display}}" id="{{path}}" data-fsc-action="Add" data-fsc-item-path-value="{{path}}" >
															</div>
															<div class="col-7">
																{{#if image}}
																<img src="{{image}}" class="img-fluid fsb-ximage p-2 hide-mini" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
																{{/if}}
																<p class="fsb-display">
																	{{display}}
																</p>
																{{>moreInfo}}
																{{>volumeDiscount}}
															</div>
															<div class="col-4 text-right">
																{{>pricing}}
															</div>
														</div>
														<hr />
														{{/each}}
													</div>
												</div>
											</div>
										</div>
									{{/iff}}
									{{#iff type "==" "config-one"}}
										{{>singleChoice}}
									{{/iff}}
									{{#iff type "==" "config-many"}}
										{{>multiChoice}}
									{{/iff}}
									{{#iff type "==" "addon-one"}}
										{{>singleChoiceAddon}}
									{{/iff}}
									{{#iff type "==" "addon-many"}}
										{{>multiChoiceAddon}}
									{{/iff}}
								{{/each}}
							</div>
						{{/iff}}
					{{/each}}
				{{/each}}
			</div>
			<div class="row align-items-center mb-4 fsb-totalBlock">	
				<div class="col-12">
					<div class="row">
						<div class="show-mini col-12">
							{{#each items}}
								{{#each items}}
									{{#iff path "==" "SystemExtension.shippingcalculation"}}
											<div class="col-8 text-right">
												<p class="fsb-shipping" data-fsb-shipping>
													Shipping:
												</p>
											</div>
											<div class="col-4 text-right">
												<p class="fsb-shipping">
													{{total}}
												</p>
											</div>
									{{/iff}}
								{{/each}}
							{{/each}}
						</div>
						<div class="col-12 col-md-6 order-md-12 order-2 mb-4 hide-mini">
							{{#each items}}
								{{#each items}}
									{{#iff path "==" "SystemExtension.shippingcalculation"}}
										<div class="row">
											<div class="col-8 text-right">
												<p class="fsb-shipping" data-fsb-shipping>
													Shipping:
												</p>
											</div>
											<div class="col-4 text-right">
												<p class="fsb-shipping">
													{{total}}
												</p>
											</div>
										</div>
									{{/iff}}
								{{/each}}
							{{/each}}
							<div class="row">
								<div class="col-8 text-right">
									<p class="fsb-total" data-fsb-orderTotal>
										Total
									</p>
								</div>
								<div class="col-4 text-right">
									{{#each order}}
										{{#iff totalValue ">" "0"}}
											<p class="fsb-total" data-fsc-order-total >
											</p>
										{{else}}
											<p class="fsb-total">
												<span data-fsb-free>Free</span>
											</p>
										{{/iff}}
										{{#if discountTotalValue}}
											<p class="text-success hide-mini">
												<span data-fsb-youSave>You Save</span> {{discountTotal}}!
											</p>
										{{/if}}
									{{/each}}
								</div>
							</div>
							<div class="row fsb-mod-checkoutblock hide-mini">
								<div class="col-12 mt-2">
									<button id="checkout" data-fsc-selections-smartdisplay style="float:right;" data-fsc-action="Checkout" onclick="fastspring_closeitall();" data-fsb-checkoutButtonClass>
										<span data-fsb-checkout>Checkout&nbsp;</span> <i data-fsb-checkoutButtonIcon></i>
									</button>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-12 order-md-1 order-2 fsb-mod-promoblock">
							<div id="promodiv" class="col-12 text-nowrap text-center text-md-left hide-mini">
								<label for="couponcode" class="fsb-promocode" id="promocodelabel" data-fsb-couponLabel>
									Enter Promotional Code
								</label>
								<input type="text" id="couponcode" data-fsc-order-promocode data-fsb-couponPlaceholder class="form-control" placeholder style="display:inline-block; width:200px;">
								<button onclick="fastspring_applycoupon();" data-fsb-applyCouponButtonClass>
									<span data-fsb-applyCoupon>Apply</span> <i data-fsb-applyCouponButtonIcon></i>
								</button>
							</div>
						</div>
					</div>
					<div class="row fsb-mod-checkoutblock show-mini text-right">
						<div class="col-12 mt-2">
							{{#each order}}
								{{#if discountTotalValue}}
									<p class="text-success">
										<span data-fsb-youSave>You Save</span> {{discountTotal}}
									</p>
								{{/if}}
							{{/each}}
						</div>
					</div>
					{{#each groups}}
						{{#iff driverType "==" "storefront"}}
							{{#each items}}
								{{#iff path "==" "SystemExtension.eds"}}
									{{#iff selected "==" false}}
										<div class="row">
											<div class="col-md-12 mt-4">
												<div class="card mt-2 mb-3">
													<div class="card-header">
														{{display}}&nbsp;
													</div>
													<div class="card-body pb-0">
														<div class="row mb-4">
															<div class="col-lg-1 col-md-1 col-4 offset-4 offset-sm-0 text-center pr-0 hide-mini">
																{{#if image}}
																<img src="{{image}}" class="img-fluid fsb-ximage" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
																{{/if}}
															</div>
															<div class="col-lg-6 col-md-4 col-sm-8 col-12 text-center text-sm-left">
																<p class="fsb-display">
																	{{display}}
																</p>
																{{>moreInfo}}
																<div class="d-md-none row mt-4">
																	<div class=" col-sm-7 col-12 text-center text-sm-left">
																		{{>pricing}}
																		{{>volumeDiscount}}
																	</div>
																	<div class="col-sm-5 col-12 text-center text-sm-right">
																		<button type="button" data-fsb-edsButtonClass data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Add">
																			<span data-fsb-eds>Add to cart</span> <i data-fsb-edsButtonIcon></i>
																		</button>
																	</div>
																</div>
															</div>
															<div class="col-lg-3 col-md-4 d-none d-md-block text-center">
																{{>pricing}}
															</div>
															<div class="col-lg-2 col-md-3 d-none d-md-block text-right">
																<button type="button" data-fsb-edsButtonClass data-fsc-item-path-value="{{path}}" data-fsc-action="Add">
																	<span data-fsb-eds>Add to cart</span> <i data-fsb-edsButtonIcon></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									{{/iff}}
								{{/iff}}
							{{/each}}
						{{/iff}}
					{{/each}}
					
				</div>
			</div>
		</div>
	</div>
	<div data-fsc-selections-smartdisplay-inverse style="display: none; text-align:center; margin-top:20px; padding: 20px 0;">
		<h3 class="fsb-emptyCart" data-fsb-orderEmpty>
			Your Order Is Empty
		</h3>
		<i class="fa fa-shopping-basket" aria-hidden="true" style="font-size: 72px"></i>	
	</div>
	{{>xSell}}
</div>
{{#each order}}
	{{#if selections}}
		<div class="fsb-modal-footer">
			<a href="#" class="footercheckout" data-fsc-action="Checkout" onclick="fastspring_closeitall();">
				<span data-fsb-checkout>Checkout</span> - 
				{{#iff totalValue ">" "0"}}
					<span class="fsb-total" data-fsc-order-total >
					</span>
				{{else}}
					<span class="fsb-total">
						<span data-fsb-free>Free</span>
					</span>
				{{/iff}}
			</a>
		</div>
	{{else}}
	<div class="fsb-modal-footer">
		<a href="#" class="footercheckout" onclick="fastspring_closeitall();">
			Close
		</a>
	</div>
	{{/if}}
{{/each}}`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "modalShoppingCart");
	script.id = "modalShoppingCart";
	document.body.appendChild(script);
	
	var script = document.createElement("script");
	script.innerHTML = `<style>
#minicart {display: none !important;}
</style>
<h3 class="fsb-cart_title m-0" data-fsb-cartTitle>
	Shopping Cart
</h3>
	<div id="fsb_error" class="fsb-alert fsb-alert-danger" role="alert">
		<p class="fsb-alert-heading">
			<strong>
				I"m sorry, there was an issue.
			</strong>
		</p>
		<p id="fsb_error_msg">
		</p>
	</div>
	<div id="fsb" data-fsc-selections-smartdisplay style="display: block;">
		<div class="container-fluid">
			<div class="row align-items-center mb-4">
				{{#each items}}
					{{#each items}}
						{{#iff path "!=" "SystemExtension.shippingcalculation"}}
							<div class="col-lg-12 fsb-border mb-4 fsb-rounded">
								<div class="row mt-4 mb-4">
									<div class="col-md-9 col-8">
										<div class="show-mini-block">
											<div class="row">
												{{#if image}}
													<div class="col-3">
														<img src="{{image}}" class="img-fluid" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
													</div>
												{{/if}}
												<div class="col">
													<p class="fsb-display p-0 m-0">
														{{display}}
													</p>
													{{>moreInfo}}
													{{>quantity}}<br />
													{{>pricing}}
													{{>volumeDiscount}}
												</div>
											</div>
										</div>
										<div class="hide-mini">
											<div class="row">
												{{#if image}}
													<div class="fsb-ximage col-3 col-md-2">
														<img src="{{image}}" class="img-fluid fsb-ximage pr-2" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
													</div>
												{{/if}}
												<div class="col">
													<p class="fsb-display p-0 m-0">
														{{display}}
													</p>
													{{>moreInfo}}
													
												</div>
												<div class="col-md-3 d-xs-none d-sm-none d-md-block">
													{{#if discountTotalValue}}
														<p class=" fsb-inline-item originalPrice"><s>{{price}}</s></p>
													{{/if}}
													{{#iff totalValue ">" "0"}}
														<p class=" fsb-inline-item price">{{unitPrice}}</p>
													{{else}}
														<p class=" fsb-inline-item text-success price" data-fsb-free>Free</p>
													{{/iff}}
													</span> &times;
													<span data-fsc-item-path="{{path}}" data-fsc-item-quantity>
													</span>
													<div class="my-1">{{>quantity}}</div>
													<div class="my-1">{{>volumeDiscount}}</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-3 col-4 text-right">
										<p class="fsb-extPrice text-nowrap m-0">
											{{#iff totalValue ">" "0"}}
												{{total}}
												{{else}}
												<span data-fsb-free>&nbsp;</span>
											{{/iff}}
											
											{{#if removable}}
												<a href="#" class="removeText" data-fsc-action="Remove" data-fsc-item-path-value="{{path}}">
													<span class="removeNone"><br /><span data-fsb-remove>Remove</span></span>
													<i data-fsb-removeIcon></i>
												</a>
											{{/if}}
										</p>
										
									</div>
								</div>
								{{#each groups}}
									{{#iff type "==" "replace"}}
										{{#iff selectableReplacements "==" true}}
											{{>upSell}}
										{{/iff}}
									{{/iff}}
									{{#iff type "==" "bundle"}}
										<div class="row">
											<div class="col offset-md-1">
												<div class="card mt-2 mb-3">
													<div class="card-header">
														{{display}} includes the following:
													</div>
													<div class="card-body pb-4">
														{{#each items}}
															{{#if image}}
																<img src="{{image}}" class="fsb-bundleimage" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
															{{/if}}
														{{/each}}
													</div>
												</div>
											</div>
										</div>
									{{/iff}}
									{{#iff type "==" "options"}}
										<div class="row">
											<div class="col-md-11 offset-md-1">
												<div class="card mt-2 mb-3">
													<div class="card-header">
														{{display}}&nbsp;
													</div>
													<div class="card-body pb-0">
														{{#each items}}
														<div class="row mb-4">
															<div class="col-1">
																<input class="fsb-option-input fsb-radio" type="radio" {{#if selected}} checked{{/if}} name="{{display}}" id="{{path}}" data-fsc-action="Add" data-fsc-item-path-value="{{path}}" >
															</div>
															<div class="col-7">
																{{#if image}}
																<img src="{{image}}" class="img-fluid fsb-ximage p-2" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
																{{/if}}
																<p class="fsb-display">
																	{{display}}
																</p>
																{{>moreInfo}}
																{{>volumeDiscount}}
															</div>
															<div class="col-4 text-right">
																{{>pricing}}
															</div>
														</div>
														<hr />
														{{/each}}
													</div>
												</div>
											</div>
										</div>
									{{/iff}}
									{{#iff type "==" "config-one"}}
										{{>singleChoice}}
									{{/iff}}
									{{#iff type "==" "config-many"}}
										{{>multiChoice}}
									{{/iff}}
									{{#iff type "==" "addon-one"}}
										{{>singleChoiceAddon}}
									{{/iff}}
									{{#iff type "==" "addon-many"}}
										{{>multiChoiceAddon}}
									{{/iff}}
								{{/each}}
							</div>
						{{/iff}}
					{{/each}}
				{{/each}}
			</div>
			<div class="row align-items-center mb-4 fsb-totalBlock">	
				<div class="col-12">
					<div class="row">
						<div class="col-12 col-md-6 order-md-12 order-2 mb-4">
							{{#each items}}
								{{#each items}}
									{{#iff path "==" "SystemExtension.shippingcalculation"}}
										<div class="row">
											<div class="col-8 text-right">
												<p class="fsb-shipping" data-fsb-shipping>
													Shipping:
												</p>
											</div>
											<div class="col-4 text-right">
												<p class="fsb-shipping">
													{{total}}
												</p>
											</div>
										</div>
									{{/iff}}
								{{/each}}
							{{/each}}
							<div class="row">
								<div class="col-8 text-right">
									<p class="fsb-total" data-fsb-orderTotal>
										Total
									</p>
								</div>
								<div class="col-4 text-right">
									{{#each order}}
										{{#iff totalValue ">" "0"}}
											<p class="fsb-total" data-fsc-order-total >
											</p>
										{{else}}
											<p class="fsb-total">
												<span data-fsb-free>Free</span>
											</p>
										{{/iff}}
										{{#if discountTotalValue}}
											<p class="text-success hide-mini">
												<span data-fsb-youSave>You Save</span> {{discountTotal}}!
											</p>
										{{/if}}
									{{/each}}
								</div>
							</div>
							<div class="row fsb-mod-checkoutblock hide-mini">
								<div class="col-12 mt-2">
									<button id="checkout" data-fsc-selections-smartdisplay style="float:right;" data-fsc-action="Checkout" onclick="fastspring_closeitall();" data-fsb-checkoutButtonClass>
										<span data-fsb-checkout>Checkout</span> <i data-fsb-checkoutButtonIcon></i>
									</button>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-12 order-md-1 order-2 fsb-mod-promoblock">
							<div id="promodiv" class="col-12 text-nowrap text-center text-md-left hide-mini">
								<label for="couponcode" class="fsb-promocode" id="promocodelabel" data-fsb-couponLabel>
									Enter Promotional Code
								</label><br />
								<input type="text" id="couponcode" data-fsc-order-promocode data-fsb-couponPlaceholder class="form-control" placeholder style="display:inline-block; width:200px;">
								<button onclick="fastspring_applycoupon();" data-fsb-applyCouponButtonClass>
									<span data-fsb-applyCoupon>Apply</span> <i data-fsb-applyCouponButtonIcon></i>
								</button>
							</div>
						</div>
					</div>
					<div class="row fsb-mod-checkoutblock show-mini text-right">
						<div class="col-12 mt-2">
							{{#each order}}
								{{#if discountTotalValue}}
									<p class="text-success">
										<span data-fsb-youSave>You Save</span> {{discountTotal}}
									</p>
								{{/if}}
							{{/each}}
						</div>
					</div>
					{{#each groups}}
						{{#iff driverType "==" "storefront"}}
							{{#each items}}
								{{#iff path "==" "SystemExtension.eds"}}
									{{#iff selected "==" false}}
										<div class="row">
											<div class="col-md-12 mt-4">
												<div class="card mt-2 mb-3">
													<div class="card-header">
														{{display}}&nbsp;
													</div>
													<div class="card-body pb-0">
														<div class="row mb-4">
															<div class="col-lg-1 col-md-1 col-4 offset-4 offset-sm-0 text-center pr-0">
																{{#if image}}
																<img src="{{image}}" class="img-fluid fsb-ximage" alt="{{display}}" data-fsc-target="#{{path}}Modal" data-fsc-toggle="modal"/>
																{{/if}}
															</div>
															<div class="col-lg-6 col-md-4 col-sm-8 col-12 text-center text-sm-left">
																<p class="fsb-display">
																	{{display}}
																</p>
																{{>moreInfo}}
																<div class="d-md-none row mt-4">
																	<div class=" col-sm-7 col-12 text-center text-sm-left">
																		{{>pricing}}
																		{{>volumeDiscount}}
																	</div>
																	<div class="col-sm-5 col-12 text-center text-sm-right">
																		<button type="button" data-fsb-edsButtonClass data-fsc-item-path-value="{{path}}" data-fsc-item-path="{{path}}" data-fsc-action="Add">
																			<span data-fsb-eds>Add to cart</span> <i data-fsb-edsButtonIcon></i>
																		</button>
																	</div>
																</div>
															</div>
															<div class="col-lg-3 col-md-4 d-none d-md-block text-center">
																{{>pricing}}
															</div>
															<div class="col-lg-2 col-md-3 d-none d-md-block text-right">
																<button type="button" data-fsb-edsButtonClass data-fsc-item-path-value="{{path}}" data-fsc-action="Add">
																	<span data-fsb-eds>Add to cart</span> <i data-fsb-edsButtonIcon></i>
																</button>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									{{/iff}}
								{{/iff}}
							{{/each}}
						{{/iff}}
					{{/each}}
					
				</div>
			</div>
		</div>
	</div>
<div data-fsc-selections-smartdisplay-inverse style="display: none; text-align:center; margin-top:20px; padding: 20px 0;">
	<h3 class="fsb-emptyCart" data-fsb-orderEmpty>
		Your Order Is Empty
	</h3>
	<i class="fa fa-shopping-basket" aria-hidden="true" style="font-size: 72px"></i>	
	<p>
	<button onclick="window.location.href=document.referrer;" data-fsb-continueShoppingButtonClass>
		<span data-fsb-continueShopping>Continue Shopping</span><i data-fsb-continueShoppingButtonIcon></i>
	</button>
	</p>
</div>
{{>xSell}}`;
	script.type = "text/x-handlebars-template";
	script.setAttribute("data-fsc-template-for", "standAloneCart");
	script.id = "standAloneCart";
	document.body.appendChild(script);
}

var fastspringmaindiv = document.createElement("div");
fastspringmaindiv.setAttribute("class","fastspring");
fastspringmaindiv.id = "fastspring";
document.body.appendChild(fastspringmaindiv);

var fastspringdiv = document.getElementById("fastspring");

var fastspring_spinner = document.createElement("div");
fastspring_spinner.id = "fastspring_spinner";
fastspring_spinner.style.cssText = 'display: none; animation-name: fsb-fadeIn;';
fastspring_spinner.innerHTML = '<img src="https://d1f8f9xcsvx3ha.cloudfront.net/pinhole/spin.svg">';
fastspringdiv.appendChild(fastspring_spinner);

if(loadFA) {
	var fontawesome = document.createElement("script");
	fontawesome.src="https://kit.fontawesome.com/0013dcfe30.js";
	fastspringdiv.appendChild(fontawesome);
}

if(enableMiniCart === true || enableMiniCart == 'yes') {
	var fastspring_minicart = document.createElement("div");
	fastspring_minicart.setAttribute("data-fsc-minicart","");
	fastspring_minicart.id='minicart';
	fastspring_minicart.style.cssText = 'display: none;';
	fastspring_minicart.onclick= function() {fastspring_openCart(cartType);};
	fastspring_minicart.setAttribute("class","minicart " + miniCartLocation);
	fastspring_minicart.innerHTML='<i class="fa ' + miniCartIcon + ' fsb-icon" aria-hidden="true"></i>	<div class="minicart-count" id="minicart-count"></div>';
	fastspringdiv.appendChild(fastspring_minicart);
}

if(enableCart) {
	var cartModals = document.createElement("div");
	cartModals.setAttribute("data-fsc-items-container", "cartModals");
	cartModals.setAttribute("class","cartModals");
	cartModals.id = "cartModals";
	fastspringdiv.appendChild(cartModals);
	var modalShoppingCart = document.createElement("div");
	modalShoppingCart.innerHTML = '<div class="fsb-modal-content" id="fsb-modal-content" data-fsc-items-container="modalShoppingCart" data-fsc-filter="selected=true">';
	modalShoppingCart.setAttribute("class","fsb-modal");
	modalShoppingCart.id = "fsb-modal";
	fastspringdiv.appendChild(modalShoppingCart);
}

var fastspringjs = document.getElementById("fsc-api");

if(enableCart) {
	if(fastspringjs.hasAttribute('data-markup-helpers-callback')) {
		var datamarkuphelperscallback = fastspringjs.getAttribute("data-markup-helpers-callback");
	}
	if(fastspringjs.hasAttribute('data-popup-closed')) {
		var datapopupclosed = fastspringjs.getAttribute("data-popup-closed");
	}
	if(fastspringjs.hasAttribute('data-error-callback')) {
		var dataerrorcallback = fastspringjs.getAttribute("data-error-callback");
	}
	if(fastspringjs.hasAttribute('data-data-callback')) {
		var datadatacallback = fastspringjs.getAttribute("data-data-callback");
	}
	if(fastspringjs.hasAttribute('data-before-requests-callback')) {
		var databeforerequestscallback = fastspringjs.getAttribute("data-before-requests-callback");
	}
	if(fastspringjs.hasAttribute('data-after-markup-callback')) {
		var dataaftermarkupcallback = fastspringjs.getAttribute("data-after-markup-callback");
	}
	if(!fastspringjs.hasAttribute('data-decorate-callback') && (enableGA === true || enableGA == 'yes')) {
		fastspringjs.setAttribute('data-decorate-callback','fastspring_DECOCB');		
	}
	fastspringjs.setAttribute('data-markup-helpers-callback','fastspring_MUHCB');
	fastspringjs.setAttribute('data-popup-closed','fastspring_PUCCB');
	fastspringjs.setAttribute('data-error-callback','fastspringECB');
	fastspringjs.setAttribute('data-data-callback','fastspring_DDCB');
	fastspringjs.setAttribute('data-before-requests-callback','fastspring_BRCB');
	fastspringjs.setAttribute('data-after-markup-callback','fastspring_AMUCB');
	fastspringjs.setAttribute('data-continuous','true');
}
	
var styles = document.createElement("style");
if(removeIcon.toUpperCase() == "TIMES" || removeIcon.toUpperCase() == "TIMESCIRCLE" || removeIcon.toUpperCase() == "TRASH" || removeIcon.toUpperCase() == "TRASHALT" || removeIcon.toUpperCase() == "MINUS" || removeIcon.toUpperCase() == "MINUSCIRCLE" || removeIcon == "fa fa-times" || removeIcon == "fa fa-times-circle" || removeIcon == "fa fa-trash" || removeIcon == "fa fa-trash-alt" || removeIcon == "fa fa-minus" || removeIcon == "fa fa-minus-circle" ) {
	styles.innerHTML += '.removeNone{display:none !important;}';	
}

if(cartHeaderBGColor !== "") {
	styles.innerHTML += '.fastspring .fsb-modal-header, .fastspring .card-header{background-color:'+ cartHeaderBGColor +' !important;}';	
}
if(cartHeaderTextColor !== "") {
	styles.innerHTML += '.fastspring .fsb-modal-header, .fastspring .card-header{color:'+ cartHeaderTextColor +' !important;}';	
}

if(miniCartCheckoutBGColor !== "") {
	styles.innerHTML += '.footercheckout {background:'+ miniCartCheckoutBGColor +' !important;}';
}
if(miniCartCheckoutTextColor !== "") {
	styles.innerHTML += '.footercheckout {color:'+ miniCartCheckoutTextColor +' !important;}';
}

if(miniCartCheckoutBGColorHover !== "") {
	styles.innerHTML += '.footercheckout:hover {background:'+ miniCartCheckoutBGColorHover +' !important;}';
}
if(miniCartCheckoutTextColorHover !== "") {
	styles.innerHTML += '.footercheckout:hover {color:'+ miniCartCheckoutTextColorHover +' !important;}';
}

styles.innerHTML += '.minicart-count {background: ' + miniCartBubbleColor + ';}';
document.body.appendChild(styles);

window.onclick = function(event) {
	if (event.target.id == "fsb-modal")
	{
		fastspring_closeitall();
	}
};

var value,
quantity = document.getElementsByClassName('fsb-number');
quantityProd = document.getElementsByClassName('fsb-numberProd');

function fastspring_changeQty(item) {
	qty = item.value;
	product = item.getAttribute("data-fsc-item-path");
	fastspring.builder.update(product, qty);	
}	

function setDefaultGeneral(prop, defaultvalue) {
	try {
		if(typeof window["fastspring_options"][prop] !== 'undefined') {
			window[prop] = window["fastspring_options"][prop];
		} else {
			throw new error()
		}
	} catch(error){
		window[prop] = defaultvalue;
	}
	
}

function setDefaultGeneralIcon(prop, defaultvalue) {
	try {
		if(typeof window["fastspring_options"][prop] !== 'undefined') {
			window[prop] = window["fastspring_options"][prop];
		} else {
			throw new error()
		}
	} catch(error){
		window[prop] = defaultvalue;
	}
	if(window[prop].toLowerCase() == 'chevron') { window[prop] = 'fa fa-chevron-right'; }
	if(window[prop].toLowerCase() == 'chevroncircle') { window[prop] = 'fa fa-chevron-right-circle'; }
	if(window[prop].toLowerCase() == 'arrow') { window[prop] = 'fa fa-arrow-right'; }
	if(window[prop].toLowerCase() == 'arrowright') { window[prop] = 'fa fa-arrow-right-circle'; }
	if(window[prop].toLowerCase() == 'basket') { window[prop] = 'fa fa-shopping-basket'; }
	if(window[prop].toLowerCase() == 'cart') { window[prop] = 'fa fa-shopping-cart'; }
	if(window[prop].toLowerCase() == 'cartplus') { window[prop] = 'fa fa-cart-plus'; }
	if(window[prop].toLowerCase() == 'plus') { window[prop] = 'fa fa-plus'; }
	if(window[prop].toLowerCase() == 'pluscircle') { window[prop] = 'fa fa-plus-circle'; }
	if(window[prop].toLowerCase() == 'lock') { window[prop] = 'fa fa-lock'; }
	if(window[prop].toLowerCase() == 'times') { window[prop] = 'fa fa-times'; }
	if(window[prop].toLowerCase() == 'timescircle') { window[prop] = 'fa fa-times-circle'; }
	if(window[prop].toLowerCase() == 'trash') { window[prop] = 'fa fa-trash'; }
	if(window[prop].toLowerCase() == 'trashalt') { window[prop] = 'fa fa-trash-alt'; }
	if(window[prop].toLowerCase() == 'minus') { window[prop] = 'fa fa-minus'; }
	if(window[prop].toLowerCase() == 'minuscircle') { window[prop] = 'fa fa-minus-circle'; }
}

function fastspring_addProd(prod, type) {
	fastspring_showSpinner();
	fastspring.builder.add(prod, function(data)
		{
			fastspring_hideSpinner();
			if(enableCart) {
				fastspring_openCart(type);
			} else {
				fastspring_openCart(cartType);
			}
		});
}

function fastspring_applycoupon() {
	var couponid= document.getElementById('couponcode').value;
	fastspring.builder.promo(couponid);
}

function fastspring_applycoupon2() {
	var couponid= document.getElementById('couponcode2').value;
	fastspring.builder.promo(couponid);
}

function fastspring_showSpinner() {
	var fsb_spinner=document.getElementById("fastspring_spinner");
	fsb_spinner.style.display = "block";
}

function fastspring_hideSpinner() {
	var fsb_spinner=document.getElementById("fastspring_spinner");
	fsb_spinner.style.animationName="fsb-revfadeIn";
	setTimeout(function()
		{
			fsb_spinner.style.animationName = "fsb-fadeIn";
			fsb_spinner.style.display = "none";
		},350);
}

function fastspring_doTranslations(datadata) {
	fastspring_translate("crossSellTitle");
	fastspring_translate("cartTitle");
	fastspring_translate("couponLabel");
	fastspring_translate("continueShopping");
	fastspring_translate("free");
	fastspring_translate("orderEmpty");
	fastspring_translate("orderTotal");
	fastspring_translate("shipping");
	fastspring_translate("viewDetails");
	fastspring_translate("youSave");
	fastspring_translatePlaceholder("couponPlaceholder");
	fastspring_translate("nextCharge");
	fastspring_translate("on");
	fastspring_translate("renewsEvery");
	fastspring_translate("renewsAutomatically");
	fastspring_translate("renewsAlongWithSubscription");
	fastspring_translate("day");
	fastspring_translate("days");
	fastspring_translate("week");
	fastspring_translate("weeks");
	fastspring_translate("month");
	fastspring_translate("months");
	fastspring_translate("year");
	fastspring_translate("years");
	fastspring_translate("applyCoupon");
	fastspring_translate("crossSell");
	fastspring_translate("checkout");
	fastspring_translate("eds");
	fastspring_translate("upSell");
	fastspring_translate("remove");	
	fastspring_translate("volumeDiscountsAvailable");
}

function fastspring_translate(translation) {
	try {
		if(window["fastspring_options"]["translations"][datadata.language][translation + "Text"]) {
			window[translation + "Text"] = window["fastspring_options"]["translations"][datadata.language][translation + "Text"];
		} else {
			throw new error()
		}
	}
	catch(error) {
		window[translation + "Text"] = window["translations"][datadata.language][translation + "Text"];
	} 
	item = document.querySelectorAll('[data-fsb-' + translation + ']');
	for (i = 0; i < item.length; ++i) {
		item[i].innerHTML = window[translation + "Text"];
	}	
}

function fastspring_translatePlaceholder(translation) {
	try {
		if(window["fastspring_options"]["translations"][datadata.language][translation]) {
			window[translation + "Text"] = window["fastspring_options"]["translations"][datadata.language][translation];
		} else {
			throw new error()
		}
	}
	catch(error) {
		window[translation + "Text"] = translations[datadata.language][translation + "Text"];
	}
	item = document.querySelectorAll('[data-fsb-' + translation + ']');
	for (i = 0; i < item.length; ++i) {
		item[i].placeholder = window[translation + "Text"];
	}
}

function fastspring_openCart(type){
	
	if(type== 'modal')
	{
		type='fsb-MOD';
	}
	if(type== 'modalsmall')
	{
		type='fsb-MODSM';
	}
	if(type== 'topleft')
	{
		type='fsb-MINI-TL';
	}
	if(type== 'topright')
	{
		type='fsb-MINI-TR';
	}
	if(type== 'bottomleft')
	{
		type='fsb-MINI-BL';
	}
	if(type== 'bottomright')
	{
		type='fsb-MINI-BR';
	}
	if(type== 'left')
	{
		type='fsb-LS';
	}
	if(type== 'right')
	{
		type='fsb-RS';
	}
	if(type== 'bottom')
	{
		type='fsb-BS';
	}
	if(type == null || type == "") {
		type = cartType;
	}
	var fsb_modal = document.getElementById('fsb-modal');
	var fsb_modalcontent = document.querySelectorAll('#fsb-modal .fsb-modal-content');
	if(!type || type == 'none'|| type == 'popupcart' || type=='standalone')
	{
		if(type == 'popupcart')
		{
			fastspring.builder.viewCart();
		}
		
		if(type == 'none') {
			fastspring.builder.checkout();
		}
		
		if(type == 'standalone') {
			if(standAloneCartPage != '') {
				window.location.replace(standAloneCartPage);
			} else {
				console.log("Warning: no stand along cart page is defined.");
			}
		}
	} else
	{
		fsb_modal.classList.add(type);
		if(type=='fsb-LS' || type == 'fsb-MINI-TL' || type == 'fsb-MINI-BL')
		{
			fsb_modalcontent[0].style.animationName = "fsb-ls_slideIn";
		}
		if(type=='fsb-RS' || type == 'fsb-MINI-TR' || type == 'fsb-MINI-BR')
		{
			fsb_modalcontent[0].style.animationName = "fsb-rs_slideIn";
		}
		if(type=='fsb-BS')
		{
			fsb_modalcontent[0].style.animationName = "fsb-bs_slideIn";
		}
		if(type=='fsb-MOD' || type=='fsb-MODSM')
		{
			fsb_modalcontent[0].style.animationName = "fsb-mod_animatetop";
		}
		fsb_modal.style.display = "block";
		document.body.classList.add("fsb-modalOpen");
	}
}

function openCart(type) {
	if(type== 'modal')
	{
		type='fsb-MOD';
	}
	if(type== 'modalsmall')
	{
		type='fsb-MODSM';
	}
	if(type== 'topleft')
	{
		type='fsb-MINI-TL';
	}
	if(type== 'topright')
	{
		type='fsb-MINI-TR';
	}
	if(type== 'bottomleft')
	{
		type='fsb-MINI-BL';
	}
	if(type== 'bottomright')
	{
		type='fsb-MINI-BR';
	}
	if(type== 'left')
	{
		type='fsb-LS';
	}
	if(type== 'right')
	{
		type='fsb-RS';
	}
	if(type== 'bottom')
	{
		type='fsb-BS';
	}
	if(type == null || type == "") {
		type = cartType;
	}
	var fsb_modal = document.getElementById('fsb-modal');
	var fsb_modalcontent = document.querySelectorAll('#fsb-modal .fsb-modal-content');
	if(!type || type == 'none'|| type == 'popupcart' || type=='standalone')
	{
		if(type == 'popupcart')
		{
			fastspring.builder.viewCart();
		}
		
		if(type == 'none') {
			fastspring.builder.checkout();
		}
		
		if(type == 'standalone') {
			if(standAloneCartPage != '') {
				window.location.replace(standAloneCartPage);
			} else {
				console.log("Warning: no stand along cart page is defined.");
			}
		}
	} else
	{
		fsb_modal.classList.add(type);
		if(type=='fsb-LS' || type == 'fsb-MINI-TL' || type == 'fsb-MINI-BL')
		{
			fsb_modalcontent[0].style.animationName = "fsb-ls_slideIn";
		}
		if(type=='fsb-RS' || type == 'fsb-MINI-TR' || type == 'fsb-MINI-BR')
		{
			fsb_modalcontent[0].style.animationName = "fsb-rs_slideIn";
		}
		if(type=='fsb-BS')
		{
			fsb_modalcontent[0].style.animationName = "fsb-bs_slideIn";
		}
		if(type=='fsb-MOD' || type=='fsb-MODSM')
		{
			fsb_modalcontent[0].style.animationName = "fsb-mod_animatetop";
		}
		fsb_modal.style.display = "block";
		document.body.classList.add("fsb-modalOpen");
	}
}

function fastspring_closeitall() {
	var fsb_modal = document.getElementById('fsb-modal');
	var fsb_modalcontent = document.querySelectorAll('#fsb-modal .fsb-modal-content');
	document.body.classList.remove("fsb-modalOpen");
	if (fsb_modal.classList.contains('fsb-BS'))
	{
		fsb_modalcontent[0].style.animationName = "fsb-bs_revslideIn";
		setTimeout(function()
			{
				fsb_modal.style.display = "none";
				fsb_modalcontent[0].style.animationName = "fsb-bs_slideIn";
			},350);
	}
	if (fsb_modal.classList.contains('fsb-LS')|| fsb_modal.classList.contains('fsb-MINI-TL')|| fsb_modal.classList.contains('fsb-MINI-BL'))
	{
		fsb_modalcontent[0].style.animationName = "fsb-ls_revslideIn";
		setTimeout(function()
			{
				fsb_modal.style.display = "none";
				fsb_modalcontent[0].style.animationName = "fsb-ls_slideIn";
			},350);
	}
	if (fsb_modal.classList.contains('fsb-RS')|| fsb_modal.classList.contains('fsb-MINI-TR')|| fsb_modal.classList.contains('fsb-MINI-BR'))
	{
		fsb_modalcontent[0].style.animationName = "fsb-rs_revslideIn";
		//fsb_modal.style.animationName="fsb-revfadeIn";
		setTimeout(function()
			{
				fsb_modal.style.display = "none";
				fsb_modalcontent[0].style.animationName = "fsb-rs_slideIn";
			},350);
	}
	if (fsb_modal.classList.contains('fsb-MOD') || fsb_modal.classList.contains('fsb-MODSM'))
	{
		fsb_modalcontent[0].style.animationName = "fsb-mod_revanimatetop";
		setTimeout(function()
			{
				fsb_modal.style.display = "none";
				fsb_modalcontent[0].style.animationName = "fsb-mod_animatetop";
			},350);
	}
	setTimeout(function()
		{
			document.getElementById('fsb-modal').classList.remove("fsb-RS");
			document.getElementById('fsb-modal').classList.remove("fsb-LS");
			document.getElementById('fsb-modal').classList.remove("fsb-BS");
			document.getElementById('fsb-modal').classList.remove("fsb-MOD");
			document.getElementById('fsb-modal').classList.remove("fsb-MODSM");
			document.getElementById('fsb-modal').classList.remove("fsb-MINI-TL");
			document.getElementById('fsb-modal').classList.remove("fsb-MINI-TR");
			document.getElementById('fsb-modal').classList.remove("fsb-MINI-BL");
			document.getElementById('fsb-modal').classList.remove("fsb-MINI-BR");
		},350);
}

function fastspring_createBindings(quantityContainer) {
	var quantityAmount = quantityContainer.getElementsByClassName('fsb-qtyinput')[0];
	var increase = quantityContainer.getElementsByClassName('fsb-plus')[0];
	var decrease = quantityContainer.getElementsByClassName('fsb-minus')[0];
	increase.addEventListener('click', function () { fastspring_increaseValue(this, quantityAmount); });
	decrease.addEventListener('click', function () { fastspring_decreaseValue(this, quantityAmount); });
}

function fastspring_createBindingsProd(quantityContainer) {
	var quantityAmountProd = quantityContainer.getElementsByClassName('fsb-qtyinputProd')[0];
	var increaseProd = quantityContainer.getElementsByClassName('fsb-plusProd')[0];
	var decreaseProd = quantityContainer.getElementsByClassName('fsb-minusProd')[0];
	increaseProd.addEventListener('click', function () { fastspring_increaseValueProd(this, quantityAmountProd); });
	decreaseProd.addEventListener('click', function () { fastspring_decreaseValueProd(this, quantityAmountProd); });
}

function fastspring_init() {
	for (var i = 0; i < quantity.length; i++ )
	{
		fastspring_createBindings(quantity[i]);
	}
	
};

function fastspring_initProd() {
	for (var i = 0; i < quantityProd.length; i++ )
	{
		fastspring_createBindingsProd(quantityProd[i]);
	}
}
fastspring_initProd();

function fastspring_increaseValue(clicker, quantityAmount) {
	value = parseInt(quantityAmount.value, 10);
	product = quantityAmount.getAttribute("data-fsc-item-path");
	value = isNaN(value) ? 0 : value;
	value++;
	quantityAmount.value = value;
	fastspring.builder.update(product, value);
}

function fastspring_decreaseValue(clicker, quantityAmount) {
	value = parseInt(quantityAmount.value, 10);
	product = quantityAmount.getAttribute("data-fsc-item-path");
	value = isNaN(value) ? 0 : value;
	if (value > 0) value--;
	quantityAmount.value = value;
	fastspring.builder.update(product, value);
}

function fastspring_increaseValueProd(clicker, quantityAmount) {
	value = parseInt(quantityAmount.value, 10);
	value = isNaN(value) ? 0 : value;
	value++;
	quantityAmount.value = value;
}

function fastspring_decreaseValueProd(clicker, quantityAmount) {
	value = parseInt(quantityAmount.value, 10);
	value = isNaN(value) ? 0 : value;
	if (value > 1) value--;
	quantityAmount.value = value;
}

function fastspring_applyClass(classval) {
	item = document.querySelectorAll('[data-fsb-' + classval + ']');
	for (i = 0; i < item.length; ++i) {
		item[i].className = window[classval];
	}
}

function fastspringECB(code, string) {
	var fsb_modal = document.getElementById('fsb-modal');
	if(fsb_modal.style.display === 'block')
	{
		var fsb_error=document.getElementById("fsb_error");
		var fsb_error_msg=document.getElementById("fsb_error_msg");
		fsb_error.style.display = "block";
		fsb_error.style.animationName = "fsb-mod_animatetop";
		fsb_error_msg.innerHTML = "Error: " + code + " - " + string;
		setTimeout(function()
			{
				fsb_error.style.animationName = "fsb-mod_revanimatetop";
				setTimeout(function()
					{
						fsb_error.style.display = "none";
					}, 400)
			},5000);
	} else
	{
		var fsb_error=document.getElementById("fsb_error");
		var fsb_error_msg=document.getElementById("fsb_error_msg");
		fsb_error.style.display = "block";
		fsb_error.style.animationName = "fsb-mod_animatetop";
		fsb_error_msg.innerHTML = "Error: " + code + " - " + string;
		setTimeout(function()
			{
				fsb_error.style.animationName = "fsb-mod_revanimatetop";
				setTimeout(function()
					{
						fsb_error.style.display = "none";
					}, 400)
			},5000);
	}
	if(dataerrorcallback !=null) {
		window[dataerrorcallback](code, string);
	}
}

function fastspring_DDCB(data) {
	datadata = data;
	if(data.messages[0])
	{
		var fsb_modal = document.getElementById('fsb-modal');
		if(fsb_modal.style.display === 'block')
		{
			var fsb_error=document.getElementById("fsb_error");
			var fsb_error_msg=document.getElementById("fsb_error_msg");
			fsb_error.style.display = "block";
			fsb_error.style.animationName = "fsb-mod_animatetop";
			fsb_error_msg.innerHTML = data.messages[0].phrase;
			setTimeout(function()
				{
					fsb_error.style.animationName = "fsb-mod_revanimatetop";
					setTimeout(function()
						{
							fsb_error.style.display = "none";
						}, 400)
				},5000);
		} else
		{
			var fsb_error=document.getElementById("fsb_error");
			var fsb_error_msg=document.getElementById("fsb_error_msg");
			fsb_error.style.display = "block";
			fsb_error.style.animationName = "fsb-mod_animatetop";
			fsb_error_msg.innerHTML = data.messages[0].phrase;
			setTimeout(function()
				{
					fsb_error.style.animationName = "fsb-mod_revanimatetop";
					setTimeout(function()
						{
							fsb_error.style.display = "none";
						}, 400)
				},5000);
		}
	}
	var minicart = document.getElementById("minicart-count");
	if(minicart)
	{
		let inCart = 0;
		if (data && data.hasOwnProperty('groups'))
		{
			const
			{
				groups
			} = data;
			
			data.groups.forEach(group =>
				{
					if (group.items && Array.isArray(group.items))
					{
						group.items.forEach(item =>
							{
								if (item.selected)
								{
									inCart += item.quantity;
								}
							});
					}
				});
		}
		document.getElementById("minicart-count").innerHTML = inCart;
		if(inCart > 0) {
			document.getElementById("minicart").style.display = "block";
		} else {
			document.getElementById("minicart").style.display = "none";
		}
	}
	if(datadatacallback != null) {
		window[datadatacallback](data);
	}
}

function fastspring_BRCB() {
	fastspring_showSpinner();
	if(databeforerequestscallback != null) {
		window[databeforerequestscallback]();
	}
}

function fastspring_AMUCB(data) {
	fastspring_hideSpinner();
	if(enableCart) {
		fastspring_init();
		if(showPromo == false || showPromo == "no") {
			var promodiv = document.getElementById("promodiv");
			promodiv.style.display = "none";
		}
		if(enableTranslations) {
			fastspring_doTranslations(datadata);	
		}
		fastspring_applyClass("checkoutButtonClass");
		fastspring_applyClass("applyCouponButtonClass");
		fastspring_applyClass("crossSellButtonClass");
		fastspring_applyClass("upSellButtonClass");
		fastspring_applyClass("edsButtonClass");
		fastspring_applyClass("continueShoppingButtonClass");
		fastspring_applyClass("applyCouponButtonIcon");
		fastspring_applyClass("checkoutButtonIcon");
		fastspring_applyClass("crossSellButtonIcon");
		fastspring_applyClass("upSellButtonIcon");
		fastspring_applyClass("edsButtonIcon");
		fastspring_applyClass("continueShoppingButtonIcon");
		if(removeIcon.toUpperCase() == "TIMES" || removeIcon.toUpperCase() == "TIMESCIRCLE" || removeIcon.toUpperCase() == "TRASH" || removeIcon.toUpperCase() == "TRASHALT" || removeIcon.toUpperCase() == "MINUS" || removeIcon.toUpperCase() == "MINUSCIRCLE" || removeIcon == "fa fa-times" || removeIcon == "fa fa-times-circle" || removeIcon == "fa fa-trash" || removeIcon == "fa fa-trash-alt" || removeIcon == "fa fa-minus" || removeIcon == "fa fa-minus-circle" ) {
			if(removeIcon.toUpperCase() == "TIMES") { removeIcon = "fa fa-times";}
			if(removeIcon.toUpperCase() == "TIMESCIRCLE") { removeIcon = "fa fa-times-circle";}
			if(removeIcon.toUpperCase() == "TRASH") { removeIcon = "fa fa-trash";}
			if(removeIcon.toUpperCase() == "TRASHALT") { removeIcon = "fa fa-trash-alt";}
			if(removeIcon.toUpperCase() == "MINUS") { removeIcon = "fa fa-minus"; }
			if(removeIcon.toUpperCase() == "MINUSCIRCLE") { removeIcon = "fa fa-minus-circle";}
			fastspring_applyClass("removeIcon");
		}
		if(dataaftermarkupcallback != null) {
			window[dataaftermarkupcallback]();
		}
	}	
}

function fastspring_DECOCB(url) {
	var linkerParam = null;
	if(typeof ga == 'function') {
		ga(function() {
			var trackers = ga.getAll();
			linkerParam = trackers[0].get('linkerParam');
		});
	}
	return (linkerParam ? url + '?' + linkerParam : url);
}

function fastspring_PUCCB(data) {
	if(datapopupclosed !=null) {
		window[datapopupclosed](data);
	}
	if(popupClosedRedirectURL != '') {
		if(data) {
			fastspring.builder.reset();
			window.location.replace(popupClosedRedirectURL + "?" + popupClosedRedirectParameter + "=" + data.reference);
		}
	}
}

function fastspring_MUHCB() {
	Handlebars.registerHelper('iff', function(lvalue, operator, rvalue, options)
		{
			var functions =
			{
				'==': function(l,r)
				{
					return l == r;
				},
				'===': function(l,r)
				{
					return l === r;
				},
				'!=': function(l,r)
				{
					return l != r;
				},
				'<': function(l,r)
				{
					return l < r;
				},
				'>': function(l,r)
				{
					return l > r;
				},
				'<=': function(l,r)
				{
					return l <= r;
				},
				'>=': function(l,r)
				{
					return l >= r;
				},
				'typeof': function(l,r)
				{
					return typeof l === r;
				}
			};
			if (!functions.hasOwnProperty(operator))
			{
				throw new Error("Handlerbars Helper 'iff' doesn't know the operator " + operator);
			}
			var result = functions[operator](lvalue,rvalue);
			if( result )
			{
				return options.fn(this);
			} else
			{
				return options.inverse(this);
			}
		});
	Handlebars.registerHelper ('truncate', function (str, len)
		{
			if (str.length > len && str.length > 0)
			{
				var new_str = str + " ";
				new_str = str.substr (0, len);
				new_str = str.substr (0, new_str.lastIndexOf(" "));
				new_str = (new_str.length > 0) ? new_str : str.substr (0, len);
				return new Handlebars.SafeString ( new_str +'...' );
			}
			return str;
		});
	Handlebars.registerPartial("quantity", document.getElementById('quantity').innerHTML);
	Handlebars.registerPartial("productModal", document.getElementById('productModal').innerHTML);
	Handlebars.registerPartial("pricing", document.getElementById('pricing').innerHTML);
	Handlebars.registerPartial("moreInfo", document.getElementById('moreInfo').innerHTML);
	Handlebars.registerPartial("volumeDiscount", document.getElementById('volumeDiscount').innerHTML);
	Handlebars.registerPartial("xSell", document.getElementById('xSell').innerHTML);
	Handlebars.registerPartial("upSell", document.getElementById('upSell').innerHTML);
	Handlebars.registerPartial("singleChoice", document.getElementById('singleChoice').innerHTML);
	Handlebars.registerPartial("singleChoiceAddon", document.getElementById('singleChoiceAddon').innerHTML);
	Handlebars.registerPartial("multiChoice", document.getElementById('multiChoice').innerHTML);
	Handlebars.registerPartial("multiChoiceAddon", document.getElementById('multiChoiceAddon').innerHTML);
	Handlebars.registerPartial("addToCart", document.getElementById('addToCart').innerHTML);
	if(datamarkuphelperscallback != null) {
		window[datamarkuphelperscallback]();
	}
}

function fsaddProd(prod, type) {
	fastspring.builder.add(prod, function(data){
		openCart(type);
	});
}

function fsbProductaddProd(product, type, id) {
	var e = document.getElementById(id);
		var qty = e.value;
		var s =
		{
			'products' : [
				{
					'path':product,
					'quantity': qty
				}
			]
		}
		fastspring.builder.push(s, function(data) {
			openCart(type);
		});
		
}