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
  const url = "http://127.0.0.1:3000/api/notes/"
  event.preventDefault()
  console.log(event.target)

  fetch(url, {
    method: 'POST',
    body: {
      nimi: event[0].value,
      kuvaus: event[1].value,
      tunnit: event[2].value,
      luokitus: event[3].value
    },
    headers: new Headers()
  })
  .then(response => console.log(response))
  .catch(e => console.log(e))    
}

const ItemForm = () => {
  const [Nimi, setNimi] = useState("")
  const [Kuvaus, setKuvaus] = useState("")
  const [Tunnit, setTunnit] = useState("")
  const [Luokitus, setLuokitus] = useState("")

  return (
    <div className="FormDiv">
      <form className="NewNote" onSubmit={Submit}>
        <input className="Nimi" placeholder="Tehtävän nimi" type="text" name="nimi" value={Nimi} onChange={e => setNimi(e.target.value)} required></input>
        <input className="Kuvaus" placeholder="Kuvaus" type="text" name="kuvaus" value={Kuvaus} onChange={e => setKuvaus(e.target.value)} required></input>
        <input className="Tunnit" placeholder="Tunnit" type="number" name="tunnit" value={Tunnit} onChange={e => setTunnit(e.target.value)} required></input>
        <select value={Luokitus} onChange={e => setLuokitus(e.target.value)}>
          <option value="kiireellinen">Kiireellinen</option>
          <option value="rento">Rento</option>
        </select>
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
        <ItemForm></ItemForm>
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
