import './App.css';
import React, { useState } from 'react'

function App() {
  const [data, setData] = useState([])
  const [isloaded, setLoaded] = useState(false)
  const url = "127.0.0.1:3000/api/notes"
  fetch(url)
  .then((response => response.json())
  .then(json => console.log(json))
  })

  return (
    <div className="App">{url}</div>
  );
}

export default App;
