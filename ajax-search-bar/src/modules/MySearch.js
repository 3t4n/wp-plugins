import $ from 'jquery'
class MySearch{
	constructor(){
		this.resultsDiv = $("#search-overlay__results");
		this.searchField = $("#search-term");
		this.events()
    	this.typingTimer
    	this.previousValue

	}
	events(){
		this.searchField.on("keyup",this.typingLogic.bind(this));		

	}
	
	typingLogic(){
		if(this.searchField.val() != this.previousValue){
			clearTimeout(this.typingTimer);
			if(this.searchField.val()){
				this.typingTimer = setTimeout(this.getResults.bind(this),2000);
			}else{
				this.resultsDiv.html('');
			}		

		}
		
		this.previousValue = this.searchField.val();
	}
	getResults() {		
		    $.getJSON(mySearchData.root_url + "posts?search=" + this.searchField.val(), posts => {
		      this.resultsDiv.html(`
		        ${posts.length ? '<ul>' : "<p>No Posts matches that search.</p>"}
		          ${posts.map(item => `<li><a href="${item.link}">${item.title.rendered}</a></li>`).join("")}
		        ${posts.length ? "</ul>" : ""}
		      `)
		    });
		
    
  }
}
export default MySearch