import React from 'react';


const Header = (props) => {
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

export {Otsikko, Header}