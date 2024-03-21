import {useState} from 'react'
import './App.css'
import {BrowserRouter, Route, Routes} from 'react-router-dom';
import HomePage from "./pages/HomePage.jsx";

function App() {
    const [count, setCount] = useState(0)

    return (
        <>
            <BrowserRouter>
                <Routes>
                    <Route path="/" element={<HomePage/>}/>
                </Routes>
            </BrowserRouter>
        </>
    )
}

export default App
