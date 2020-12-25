import './App.css';
import React, { useState, useEffect } from 'react'
import Form from './components/FormHandling'
import ListItem from './components/ItemListing'
import {Otsikko, Header} from './components/Headers'

function App() {
  const url = "http://127.0.0.1:3000/api/notes/"
  const [formVisible, setFormVisible] = useState(false)
  const [data, setData] = useState([])
  const [isloaded, setLoaded] = useState(false)

  useEffect(() => {
      fetch(url)
      .then(response => response.json())
      .then(merkinta => setData(merkinta.data))
      .finally(setLoaded(true))
      
  }, [])

  return (

    <div className="App">
      <div className="Header">
        <Header text="Tuntikirjasovellus" className="Header-items"></Header>
        <button className="Header-items DisplayForm" onClick={() => setFormVisible(!formVisible)}>Lisää uusi merkintä</button>
      </div>
        {formVisible ?
        <Form url = {url}></Form>
        : null
      }
      <div className="Otsikot">
        <Otsikko text="Nimi"></Otsikko>
        <Otsikko text="Kuvaus"></Otsikko>
        <Otsikko text="Tunnit"></Otsikko>
        <Otsikko text="Luokitus"></Otsikko>
      </div>
        {!isloaded ? <p>Ladataan...</p> : <ListItem data={data} url={url}></ListItem>}
    </div>
    
  );
}

export default App;
