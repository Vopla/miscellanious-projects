import React, { useState } from 'react'

const Submit = (event, props) => {
    event.preventDefault()
    console.log(event.target)
  
    fetch(props.url, {
      method: 'POST',
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify({
        nimi: props.Nimi,
        kuvaus: props.Kuvaus,
        tunnit: props.Tunnit,
        luokitus: props.Luokitus
      }),
      
    })
    .then(response => console.log(response))
    .catch(e => console.log(e))    
  }
  
  const Form = (props) => {
    const [Nimi, setNimi] = useState("")
    const [Kuvaus, setKuvaus] = useState("")
    const [Tunnit, setTunnit] = useState("")
    const [Luokitus, setLuokitus] = useState("")
    const url = props.url
  
    return (
      <div className="FormDiv">
        <form className="NewNote" onSubmit={e => Submit(e, {Nimi, Kuvaus, Tunnit, Luokitus , url})}>
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

export default Form