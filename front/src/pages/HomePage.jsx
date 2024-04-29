import React from 'react';
import { Link } from 'react-router-dom';
import fuji_sticker from "../assets/fuji_sticker.png";
import 'tailwindcss/tailwind.css';

const HomePage = () => {
    return (
        <div>
            <Link to="/login" style={{ textDecoration: 'none', display: 'block', textAlign: 'center' }}>
                <img src={fuji_sticker} alt="fuji_sticker" /> 
                <h1 style={{ color : '#e11d48' }}>FUJIFY</h1>
            </Link>
        </div> 
    );
};

export default HomePage;
