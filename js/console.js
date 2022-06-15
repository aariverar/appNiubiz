const consoleInput = document.querySelector(".console-input");
const historyContainer = document.querySelector(".console-history");

function addExecute(inputAsString, output) {
  const inputLogElement = document.createElement("div");
  inputLogElement.classList.add("console-input-log");
  inputLogElement.textContent = `> ${inputAsString}`;
  historyContainer.append(inputLogElement);
}

function addResult(output) {
  const outputAsString =
    output instanceof Array ? `[${output.join(", ")}]` : output;

  const outputLogElement = document.createElement("div");
  outputLogElement.classList.add("console-output-log");
  outputLogElement.textContent = outputAsString;

  historyContainer.append(outputLogElement);
}

function execute(type = 1){
  historyContainer.value = "";

  const code = consoleInput.value.trim();
  // addExecute(code, eval(code));
  // addResult(code);

  try {
    if (type == 1){
      addExecute(code, eval(code));
    }else{
      addResult(code);
    }
  } catch (err) {
    if (type == 1){
      addExecute(code);
    }else{
      addResult(code);
    }
  }

  consoleInput.value = "";
  historyContainer.scrollTop = historyContainer.scrollHeight;
}

consoleInput.addEventListener("keyup", (e) => {
  historyContainer.value = "";

  const code = consoleInput.value.trim();
  if (code.length === 0) {
    return;
  }
  if (e.key === "Enter") {
    try {
      addExecute(code, eval(code));
    } catch (err) {
      addExecute(code);
      // addResult(err);
    }
    consoleInput.value = "";
    historyContainer.scrollTop = historyContainer.scrollHeight;
  }
});


