pingScan = document.querySelector("#ping");
portScan = document.querySelector("#port");
commonScan = document.querySelector("#commonPorts");
fastScan = document.querySelector("#fast");

portRange = document.querySelector("#portRange")

aggroDiv = document.querySelector("div#aggro");

portScan.onclick = function() {
    portRange.style.display = '';
    aggroDiv.style.display = '';
}
commonScan.onclick = function() {
    portRange.style.display = 'none';
    aggroDiv.style.display = '';
}
fastScan.onclick = function() {
    portRange.style.display = 'none';
    aggroDiv.style.display = '';
}



pingScan.onclick = function() {
    portRange.style.display = 'none';
    aggroDiv.style.display = 'none';
}