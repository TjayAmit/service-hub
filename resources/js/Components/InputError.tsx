import type { HTMLAttributes } from "react";


export default function InputError({ message, className = '', ...props }: HTMLAttributes<HTMLParagraphElement> & {message?: string | undefined}) {
    return message ? (
        <p
            {...props}
            className={'text-sm text-red-600 ' + className}
        >
            {message}
        </p>
    ) : null;
}
