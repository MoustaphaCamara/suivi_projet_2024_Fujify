import React from 'react';
import { Link } from 'react-router-dom';
import fuji_sticker from "../assets/fuji_sticker.png";

const ConnectionPage = () => {
    return (
        <div>
            <img src={fuji_sticker} alt="fuji_sticker" /> 
            <h1 style={{ color: '#e11d48' }}>FUJIFY</h1>
            <div style={{ textAlign: 'center' }}>
                <Link to="/login" style={{ marginRight: '10px' }}>
                    <button className="btn">I already have an account</button>
                </Link>
                <Link to="/signup">
                    <button className="btn">Create an account</button>
                </Link>
            </div>
        </div> 
    );
};

export default ConnectionPage;
