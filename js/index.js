// JavaScript Document

var map;
var contribute_map;


require(["esri/map", "dojo/domReady!"], function(Map) {
  map = new Map("AMmap", {
    center: [-73.57941804326065,45.50589273223628],
    zoom: 20,
    basemap: "gray"
  });
  
  contribute_map = new Map("CONTmap", {
    center: [-73.57941804326065,45.50589273223628],
    zoom: 20,
    basemap: "gray"
  });
});