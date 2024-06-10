import React, {useEffect, useState} from 'react';

const ButtonFJ = (props) => {
    const [color, setColor] = useState("");
    const [isDisabled, setIsDisabled] = useState(false);

    useEffect(() => {
        if (props.variant === "disabled") {
            setIsDisabled(true)
        }
        switch (props.variant) {
            case "pink-black":
                setColor("bg-[#BD5784] text-black");
                break;
            case "white-black":
                setColor("bg-[#D9D9D9] text-black");
                break;
            case "white-pink":
                setColor("bg-[#D9D9D9] text-[#BD5784]");
                break;
            case "black-white":
                setColor("bg-black text-white");
                break;
            case "black-pink":
                setColor("bg-black text-[#BD5784] border-2 border-[#BD5784]");
                break;
            case "disabled":
                setColor("cursor-not-allowed bg-[#A6A6A6] text-white border-2 border-white");
                break;
            default:
                setColor("bg-[#BD5784] text-white ");
        }
    }, [color]);
    return (
        <>
            <button disabled={isDisabled} className={`${color} ${props.icon && 'flex gap-2 items-center'}`}>
                {props.icon}
                {props.content}
            </button>
        </>
    );
};

export default ButtonFJ;