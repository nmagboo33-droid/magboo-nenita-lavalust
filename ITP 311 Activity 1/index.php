<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>JavaScript Events Demo</title>
<style>
  body {
    font-family: Georgia, 'Times New Roman', serif;
    padding: 30px 60px;
    color: #111;
  }
  h1 {
    font-size: 1.4em;
    margin-bottom: 20px;
  }
  h2 {
    font-size: 1.1em;
    margin-top: 30px;
    margin-bottom: 10px;
  }
  section {
    margin-left: 40px;
  }
  button {
    font-family: inherit;
    font-size: 0.95em;
    padding: 4px 10px;
    margin-right: 8px;
    background: #fff;
    border: 1px solid #888;
    border-radius: 2px;
    cursor: pointer;
  }
  button:hover {
    background: #f0f0f0;
  }
  #parentDiv {
    background: #a9d3e0;
    padding: 20px;
    width: 350px;
    margin-top: 10px;
  }
  #childButton {
    background: #fff;
  }
</style>
</head>
<body>

<h1>Sample Output:</h1>

<section>
  <h2>Basic Event Handlers</h2>
  <button id="clickBtn">Click Me</button>
  <button id="hoverBtn">Hover Over Me</button>
  <button id="dblclickBtn">Double Click Me</button>

  <h2>Custom Event</h2>
  <button id="customBtn">Trigger Custom Event</button>

  <h2>Event Bubbling and Capturing</h2>
  <div id="parentDiv">
    Parent Div
    <button id="childButton">Child Button</button>
  </div>
</section>

<script>
  // -------------------------------
  // 1. Basic Event Handlers
  // -------------------------------

  // Button 1: click event -> alert
  const clickBtn = document.getElementById('clickBtn');
  clickBtn.addEventListener('click', function () {
    alert('Button clicked!');
  });

  // Button 2: mouseover event -> console log
  const hoverBtn = document.getElementById('hoverBtn');
  hoverBtn.addEventListener('mouseover', function () {
    console.log('Mouse is over me!');
  });

  // Button 3: dblclick event -> alert
  const dblclickBtn = document.getElementById('dblclickBtn');
  dblclickBtn.addEventListener('dblclick', function () {
    alert('Double clicked!');
  });

  // -------------------------------
  // 2. Custom Event
  // -------------------------------

  // Create a custom event named "helloEvent"
  const helloEvent = new CustomEvent('helloEvent');

  // Listen for the custom event on the document (or any element)
  document.addEventListener('helloEvent', function () {
    console.log('Custom helloEvent triggered!');
  });

  // Button that dispatches the custom event when clicked
  const customBtn = document.getElementById('customBtn');
  customBtn.addEventListener('click', function () {
    document.dispatchEvent(helloEvent);
  });

  // -------------------------------
  // 3. Event Bubbling and Capturing
  // -------------------------------

  const parentDiv = document.getElementById('parentDiv');
  const childButton = document.getElementById('childButton');

  // Parent listener registered with capture: true
  // This means the parent's handler fires during the CAPTURING phase,
  // i.e. BEFORE the event reaches the target (the child button).
  parentDiv.addEventListener('click', function () {
    console.log('Parent DIV clicked (capturing)');
  }, { capture: true });

  // Child listener registered with capture: false (the default)
  // This means the child's handler fires during the BUBBLING phase,
  // i.e. AFTER the capturing phase, when the event is dispatched
  // on the target itself, and then bubbles back up.
  childButton.addEventListener('click', function () {
    console.log('Child Button clicked (bubbling)');
  }, { capture: false });

  // Explanation:
  // The DOM event flow has three phases: capturing -> target -> bubbling.
  // Because the parent's listener uses { capture: true }, it runs first,
  // while the event is still traveling DOWN from the document to the
  // target element. Only after that does the event reach the child
  // button and its bubbling-phase listener fires.
  // So clicking "Child Button" logs:
  //   1. "Parent DIV clicked (capturing)"
  //   2. "Child Button clicked (bubbling)"
</script>

</body>
</html>