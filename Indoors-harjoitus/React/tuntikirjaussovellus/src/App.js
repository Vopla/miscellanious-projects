import './App.css';
import React, { useState } from 'react'

const Header = (props)=>{
  return(
    <div className={props.className}>
      {props.text}
    </div>
  )
}

const Otsikko = ({text}) => {
  return(
    <p className={text}>{text}</p>
  )
}

const Submit = (event) => {
  console.log(event)
  event.preventDefault()

  fetch(event.url, {
    method: 'POST',
    body: event.target
  })
  .then(response => console.log(response))
}

const handleNoteChange = (event) => { 
  event.preventDefault()  
  console.log(event.target.value)   
}

const Button = (props) => {
  return(
    <button onClick={props.action}>{props.name}</button>
  )
}

const ItemForm = ({formData, setFormData}) => {

  return (
    <div className="FormDiv">
      <form className="NewNote" onSubmit={Submit}>
        <input className="Nimi" placeholder="Tehtävän nimi" type="text" name="nimi" value={formData.nimi} onChange={e => setFormData({nimi :e.target.value})} required></input>
        <input className="Kuvaus" placeholder="Kuvaus" type="text" name="kuvaus" value={formData.kuvaus} onChange={e => setFormData({kuvaus :e.target.value})} required></input>
        <input className="Tunnit" placeholder="Tunnit" type="number" name="tunnit" value={formData.tunnit} onChange={e => setFormData({tunnit :e.target.value})} required></input>
        <input className="Luokitus" placeholder="Luokitus" type="text" name="luokitus" value={formData.luokitus} onChange={e => setFormData({luokitus :e.target.value})}></input>
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
    nimi: "",
    kuvaus: "",
    tunnit: "",
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
      <Header text="Tuntikirjasovellus" className="Header"></Header>
        <ItemForm formData={formData} setFormData={setFormData}></ItemForm>
      <div className="Otsikot">
        <Otsikko text="Nimi"></Otsikko>
        <Otsikko text="Kuvaus"></Otsikko>
        <Otsikko text="Tunnit"></Otsikko>
        <Otsikko text="Luokitus"></Otsikko>
      </div>
      <ListItem data={data}></ListItem>
    </div>
    
  );
}

export default App;
