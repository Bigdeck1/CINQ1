import tkinter as tk
from tkinter import scrolledtext
import threading
import time

class LyricsApp:
    def __init__(self, root):
        self.root = root
        self.root.title("Palagi")
        self.root.geometry("600x500")
        self.root.configure(bg="#282c34")

        self.lyrics = [
           "basta 'wag mo 'ko iwanan",
            "pwede ba?",    
            "Isip at ang puso",
            "ba't 'di pa palayain?",
            "Nakagapos sa kahapon",
            "ang init ng damdamin",
            "Paano",
            "saan",
            "at kailan ka yayakapin?",
            "Sa pag-ikot ",
            "ng mundo ",
            "ko sa'yo palagi"
        ]
        
        self.line_delays = [2, 1, 1.5, 1.5, 1.5, 1.5, 0.5, 1, 0.5, 1, 1.5]
        self.stop_thread = False

        title_label = tk.Label(root, text="Customizable Lyrics Viewer", font=("Helvetica", 16, "bold"), fg="#61dafb", bg="#282c34")
        title_label.pack(pady=10)

        self.input_frame = tk.Frame(root, bg="#282c34")
        self.input_frame.pack(pady=10)

        self.lyrics_label = tk.Label(self.input_frame, text="Enter your lyrics below:", fg="#abb2bf", bg="#282c34")
        self.lyrics_label.grid(row=0, column=0, padx=5, pady=5, sticky="w")

        self.lyrics_text = scrolledtext.ScrolledText(self.input_frame, wrap=tk.WORD, width=50, height=10, bg="#3e4451", fg="#dcdfe4")
        self.lyrics_text.grid(row=1, column=0, columnspan=2, padx=5, pady=5)
        self.lyrics_text.insert(tk.END, "\n".join(self.lyrics))

        button_frame = tk.Frame(root, bg="#282c34")
        button_frame.pack(pady=10)

        self.display_button = tk.Button(button_frame, text="Display Lyrics", command=self.display_lyrics, bg="#61dafb", fg="#282c34")
        self.display_button.grid(row=0, column=0, padx=5)

        self.stop_button = tk.Button(button_frame, text="Stop", command=self.stop_lyrics, bg="#d9534f", fg="#ffffff")
        self.stop_button.grid(row=0, column=1, padx=5)

        self.repeat_button = tk.Button(button_frame, text="Repeat from Start", command=self.repeat_lyrics, bg="#5bc0de", fg="#282c34")
        self.repeat_button.grid(row=0, column=2, padx=5)

        self.lyrics_display = tk.Label(root, text="", wraplength=500, justify="left", fg="#dcdfe4", bg="#282c34", font=("Helvetica", 14))
        self.lyrics_display.pack(pady=20)

    def display_lyrics(self):
        self.stop_thread = False
        lyrics = self.lyrics_text.get("1.0", tk.END).strip().split("\n")

        def show_lyrics():
            for index, line in enumerate(lyrics):
                if self.stop_thread:
                    break
                self.lyrics_display.config(text=line)
                self.root.update()
                time.sleep(self.line_delays[index])
            else:
                self.stop_thread = True  # Set this to avoid repeating automatically

        threading.Thread(target=show_lyrics).start()

    def stop_lyrics(self):
        self.stop_thread = True

    def repeat_lyrics(self):
        self.stop_thread = True
        time.sleep(0.1)  # Short delay to ensure the current thread stops
        self.display_lyrics()

if __name__ == "__main__":
    root = tk.Tk()
    app = LyricsApp(root)
    root.mainloop()