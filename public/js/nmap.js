pingScan = document.querySelector("#ping");
portScan = document.querySelector("#port");
commonScan = document.querySelector("#commonPorts");
fastScan = document.querySelector("#fast");

portRange = document.querySelector("#portRange")

aggroDiv = document.querySelector("div#aggro");
timingDiv = document.querySelector("div#timing");
firewallDiv = document.querySelector("div#firewall");


portScan.onclick = function() {
    portRange.style.display = '';
    aggroDiv.style.display = '';
    timingDiv.style.display = '';
    firewallDiv.style.display = '';
}
commonScan.onclick = function() {
    portRange.style.display = 'none';
    aggroDiv.style.display = '';
    timingDiv.style.display = '';
    firewallDiv.style.display = '';
}
fastScan.onclick = function() {
    portRange.style.display = 'none';
    aggroDiv.style.display = '';
    timingDiv.style.display = '';
    firewallDiv.style.display = '';
}



pingScan.onclick = function() {
    portRange.style.display = 'none';
    aggroDiv.style.display = 'none';
    timingDiv.style.display = 'none';
    firewallDiv.style.display = 'none';
}