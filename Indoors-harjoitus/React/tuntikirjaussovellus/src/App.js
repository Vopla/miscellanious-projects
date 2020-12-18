import './App.css';
import React, { useState } from 'react'

const Header = (props)=>{
  return(
    <p>{props.url}</p>
  )
}


const ListItem = (props) =>{
    const data = props.data

  return (
    <div>
          {data.map(item => 
            <ul key={item.id} className="Osio">
              <li className="Nimi">{item.nimi}</li>
              <li className="Kuvaus">{item.kuvaus}</li>
              <li className="Tunnit">{item.tunnit}</li>
              <li className="Luokitus">{item.luokitus}</li>
            </ul>
          )}
    </div>

  )
}

function App() {
  const [data, setData] = useState([])
  const [isloaded, setLoaded] = useState(false)
  const url = "http://127.0.0.1:3000/api/notes/"
  
  if (!isloaded){
  fetch(url)
  .then(response => response.json())
  .then(merkinta => setData(merkinta.data))
  .finally(setLoaded(true))
  }

  
  return (

    <div className="App">
      <Header url={url} className="Header"></Header>
      <div className="Otsikot">
        <p className="Nimi">Nimi</p>
        <p className="Kuvaus">Kuvaus</p>
        <p className="Tunnit">Tunnit</p>
        <p className="Luokitus">Luokitus</p>
      </div>
      <ListItem data={data}></ListItem>
    </div>
    
  );
}

export default App;
