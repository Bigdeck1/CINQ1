import tkinter as tk
import random

class MovingButtonGame:
    def __init__(self, master):
        self.master = master
        self.master.title("Birthday Game")
        self.master.geometry("600x600")
        
        self.time_left = 10
        self.button_clicked = False
        
        # Background decoration
        self.canvas = tk.Canvas(self.master, width=600, height=600, bg="pink")
        self.canvas.pack(fill="both", expand=True)
        
        # Create a button
        self.button = tk.Button(self.master, text="START!", command=self.button_click, bg="yellow", fg="purple", font=("Arial", 16, "bold"))
        self.button.place(x=250, y=250)  # Start position
        
        # Create a timer label
        self.timer_label = tk.Label(self.master, text=f"Time left: {self.time_left}s", font=("Arial", 18), bg="pink")
        self.timer_label.place(x=10, y=10)
        
        # Start the countdown
        self.update_timer()

    def button_click(self):
        self.button_clicked = True
        self.change_position()

    def change_position(self):
        new_x = random.randint(0, self.master.winfo_width() - self.button.winfo_width())
        new_y = random.randint(0, self.master.winfo_height() - self.button.winfo_height())
        self.button.place(x=new_x, y=new_y)

    def update_timer(self):
        if self.time_left > 0:
            self.time_left -= 1
            self.timer_label.config(text=f"Time left: {self.time_left}s")
            self.master.after(1000, self.update_timer)
        else:
            self.end_game()

    def end_game(self):
        self.button.config(state="disabled")
        if self.button_clicked:
            self.timer_label.config(text="Time's up! Lose!")
            self.show_try_again_popup()
        else:
            self.timer_label.config(text="You win!")
            self.show_win_popup()

    def show_try_again_popup(self):
        popup = tk.Toplevel(self.master)
        popup.title("Game Over")
        popup.geometry("300x200")
        popup.config(bg="pink")

        msg = tk.Label(popup, text="Time's up! Try again?", font=("Arial", 14), bg="pink")
        msg.pack(pady=20)

        try_again_button = tk.Button(popup, text="Try Again", command=lambda: self.restart_game(popup), bg="yellow", fg="purple", font=("Arial", 12, "bold"))
        try_again_button.pack()

    def show_win_popup(self):
        popup = tk.Toplevel(self.master)
        popup.title("You Win!")
        popup.geometry("400x200")
        popup.config(bg="pink")

        msg = tk.Label(popup, text="You win! Say Happy Birthday Anna Mae!", font=("Arial", 14), bg="pink")
        msg.pack(pady=20)

        try_again_button = tk.Button(popup, text="Play Again", command=lambda: self.restart_game(popup), bg="yellow", fg="purple", font=("Arial", 12, "bold"))
        try_again_button.pack()

    def restart_game(self, popup):
        popup.destroy()
        self.time_left = 10
        self.button_clicked = False
        self.timer_label.config(text=f"Time left: {self.time_left}s")
        self.button.config(state="normal")
        self.button.place(x=250, y=250)
        self.update_timer()

# Create the main window
root = tk.Tk()
game = MovingButtonGame(root)
root.mainloop()
