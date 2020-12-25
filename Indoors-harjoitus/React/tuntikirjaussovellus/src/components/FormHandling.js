import React, { useState } from 'react'

const Submit = (event, props) => {
    console.log(props)
    event.preventDefault()
  
    fetch(props.url, {
      method: 'POST',
      headers: {
        "Content-Type": "application/json"
      },
      body: JSON.stringify(
        props.FormValues
      ),
      
    })
    .then(response => console.log(`Status: ${response.status}`))
    .catch(e => console.log(e))
    
    props.setFormValues({
      ...props.FormValues,
      nimi: "",
      kuvaus: "",
      tunnit: "",
      luokitus: ""
    })
}

  const Form = (props) => {
    const [FormValues, setFormValues] = useState({
      nimi: "",
      kuvaus: "",
      tunnit: "",
      luokitus: ""
    })
    const url = props.url
  
    return (
      <div className="FormDiv">
        <form className="NewNote" onSubmit={e => Submit(e, {FormValues, setFormValues, url})}>
          <input className="TheForm" placeholder="Tehtävän nimi" type="text" name="name" value={FormValues.nimi} onChange={e => setFormValues({...FormValues, nimi: e.target.value})} required></input>
          <input className="TheForm" placeholder="Kuvaus" type="text" name="desc" value={FormValues.kuvaus} onChange={e => setFormValues({...FormValues, kuvaus: e.target.value })} required></input>
          <input className="TheForm" placeholder="Tunnit" type="number" name="hours" value={FormValues.tunnit} onChange={e => setFormValues({...FormValues, tunnit: e.target.value})} required></input>
          <select value={FormValues.luokitus} onChange={e => setFormValues({...FormValues, luokitus: e.target.value})}>
            <option value="kiireellinen">Kiireellinen</option>
            <option value="rento">Rento</option>
          </select>
          <input className="TheForm" type="submit" value="Lähetä"></input>
        </form>
      </div>
    )
  }

export default Form