import './App.css';
import React, { useState } from 'react'

const Header = (props)=>{
  return(
    <p>{props.url}</p>
  )
}

const Submit = (event) => {
  event.preventDefault()
  const data = event.data

  fetch(event.url, {
    method: 'POST',
    body: data
  })
  .then(response => console.log(response))
}

const handleNoteChange = (event) => {   
  console.log(event.target.value)   
  setFormData(event.target.value)
 
}

const Button = (props) => {
  return(
    <button onClick={props.action}>{props.name}</button>
  )
}

const ItemForm = (props) => {
  const formData = props.formData 

  return (
    <div>
      <form className="NewNote" onSubmit={Submit}>
        <input className="Nimi" placeholder="Tehtävän nimi" type="text" name="nimi" value="nimi" onChange={handleNoteChange} required></input>
        <input className="Kuvaus" placeholder="Kuvaus" type="text" name="kuvaus" value="kuvaus" onChange={handleNoteChange} required></input>
        <input className="Tunnit" placeholder="Tunnit" type="number" name="tunnit" value="tunnit" onChange={handleNoteChange} required></input>
        <input className="Luokitus" placeholder="Luokitus" type="text" name="luokitus" value="luokitus" onChange={handleNoteChange}></input>
        <input className="Send" type="submit" value="Lähetä"></input>
      </form>
    </div>
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
  const [formData, setFormData] = useState({
    nimi: null,
    kuvaus: null,
    tunnit: null,
    luokitus: "",
  })
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
        <ItemForm formData={formData}></ItemForm>
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
