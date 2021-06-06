const server = {
	host: location.origin + "/cb-school/api/",
	headers: {
		Accept: "application/json",
		"Content-Type": "application/json",
		"Allow-Access-Control-Origin": "*"
	}
};

let keywords = [];

$(document).ready(() => {
	inputValue = document.getElementById("myInput");
	//debouchesm = document.getElementById("debouchesm");

	getKeywords().then(() => {
		autocomplete(inputValue, keywords);
		//autocomplete(debouchesm, keywords);
	});
});

const getKeywords = async () => {
	let words = await axios({
		url: server.host + "suggest/",
		method: "GET",
		headers: server.headers
	});
	console.log(server.host);

	if (words.data.success) {
		for (let i = 0; i < words.data.data.length; i++) {
			const word = words.data.data[i];
			keywords = keywords.concat(word.mot);
		}
	} else {
		console.log("ERROR FETCHING KEYWORDS");
	}
};

let buttonValidate = document.getElementById("validateKeyWords");

buttonValidate.addEventListener("click", function (e) {

	let lis = document.getElementById("choice-list").getElementsByTagName("li");
	var keyWordsChoosenInput = document.getElementById("keyWordsValues");

	for (let i = 0; i < lis.length; i++) {

		const element = lis[i];

		//keyWordsChoosenInput.hidden = false;

		if (i == 0) {
			keyWordsChoosenInput.value = element.textContent;
		}
		else {
			keyWordsChoosenInput.value = keyWordsChoosenInput.value + "," + element.textContent;
		}

	}

})
