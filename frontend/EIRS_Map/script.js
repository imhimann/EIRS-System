mapboxgl.accessToken = 'pk.eyJ1IjoicXVhc2ltZiIsImEiOiJjbDI4NXkzNnQwMmdjM2JuM3dtaHVua2IyIn0.ZZi7Z6YDe432T3I4YWdnrg';

navigator.geolocation.getCurrentPosition(successLocation, errorLocation, {
    enableHighAccuracy: true
  })
  
  function successLocation(position) {
    setupMap([position.coords.longitude, position.coords.latitude])
  }
  
  function errorLocation() {
    setupMap([-2.24, 53.48])
  }
  
  function setupMap(center) {
    const map = new mapboxgl.Map({
      container: "map",
      style: "mapbox://styles/mapbox/streets-v11",
      center: center,
      zoom: 15
    })
  
    const nav = new mapboxgl.NavigationControl()
    map.addControl(nav)
  

  
    map.addControl(directions, "top-left")
  }