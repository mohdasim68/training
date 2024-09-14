// The autoComplete.js Engine instance creator
const autoCompleteJS = new autoComplete({
  data: {
    src: async (query) => {
      try {
        // Loading placeholder text
        document.getElementById("autoComplete").setAttribute("placeholder", "Loading...");
        // Fetch External Data Source

        const source = await fetch("https://XXXX.com/index.php?entryPoint=searchBarGetResults", {
          method: "POST",
          body: JSON.stringify({query:query,module:document.getElementsByName('module')[3].value.toLowerCase()})
          
        });
                
        const data = await source.json();

        // Post Loading placeholder text
        document.getElementById("autoComplete").setAttribute("placeholder", autoCompleteJS.placeHolder);
        // Returns Fetched data
        return data;
      } catch (error) {
        return error;
      }
    },
    keys: ["id", "name", "numberId"],
    cache: false,
  },
  placeHolder: "Search ...",
  threshold: 3,
  resultsList: {
    element: (list, data) => {
      const info = document.createElement("p");
      if (data.results.length) {
        info.innerHTML = `Displaying <strong>${data.results.length}</strong> out of <strong>${data.matches.length}</strong> results`;
      } else {
        info.innerHTML = `Found <strong>${data.matches.length}</strong> matching results for <strong>"${data.query}"</strong>`;
      }
      list.prepend(info);
    },
    noResults: true,
    maxResults: 50,
    tabSelect: true,
  },
  resultItem: {
    element: (item, data) => {

      arrayOfData = data.match.split(":");

      // Modify Results Item Style
      item.style = "display: flex; justify-content: space-between;";
      // Modify Results Item Content
      item.innerHTML = `

      <span style="display: flex; align-items: center; font-size: 12px;">
        ${arrayOfData[1]}
      </span>

      <span style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; font-size: 12px">
       ${arrayOfData[0]}
      </span>
      
      `;
    
    },
    highlight: true,
  },
  events: {
    input: {
      focus() {
        if (autoCompleteJS.input.value.length) autoCompleteJS.start();
      },
      selection(event) {

        const selection = event.detail.selection.value;
        autoCompleteJS.input.value = event.detail.selection.value['name']; 

        var record = event.detail.selection.value['id'];
        var module = document.getElementsByName('module')[3].value;
        var link = "https://XXXXXX.com/index.php?module=" + module + "&action=DetailView&record=" + record;

        goBox.setAttribute('style','display:initial;padding:5px 8px 7px 7px; top:-1;color:white;border:none;border-radius: 4px;background-color: #1f4351;color: #fff;margin: 0 2px 0 10px;line-height: 26px;height: 26px;width: 26px;');
        
        document.getElementById("goBox").onclick = function() {

          goBox.setAttribute('style','display:none;padding:5px 8px 7px 7px; top:-1;color:white;border:none;border-radius: 4px;background-color: #1f4351;color: #fff;margin: 0 2px 0 10px;line-height: 26px;height: 26px;width: 26px;');    
          goBox.style.display='none';
          window.open(link);
      
        };         
        
      },
    },
  },
});


document.getElementById('autoComplete').addEventListener('blur', function() {
  autoCompleteJS.input.value = "";  
});





