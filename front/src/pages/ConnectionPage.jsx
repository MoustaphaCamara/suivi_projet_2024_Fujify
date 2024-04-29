import React from 'react';
import ButtonFJ from "../components/ButtonFJ.jsx";
import fuji_sticker from "../assets/fuji_sticker.png";


const ConnectionPage = () => {
    return (
        <div>
            <img src={fuji_sticker} alt="fuji_sticker" /> 
            <h1 style={{ color: '#e11d48' }}>FUJIFY</h1>
        </div> 
    );
};

export default ConnectionPage;